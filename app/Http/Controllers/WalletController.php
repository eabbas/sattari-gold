<?php

namespace App\Http\Controllers;

use App\Models\logo;
use App\Models\transaction;
use App\Models\User;
use App\Models\wallet;
use App\Models\deal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Log;

class WalletController extends Controller
{
    public function wallet(User $user)
    {
        $logo = logo::first();
        return view('user.user.wallet', ['user' => $user, 'logo' => $logo]);
    }
    public function transactionRequest(Request $request)
    {
        $request->validate(
            [
                'transactionType' => ['required'],
            ],
            [
                'transactionType.required' => 'ابتدا نوع تراکنش خود را مشخص کنید.',
            ]
        );
        if ($request->transactionType == 'deposit') {
            return $this->deposit($request);
        }
        if ($request->transactionType == 'withdraw') {
            return $this->withdraw($request);
        }
    }
    public function deposit($request)
    {
        $request->validate(
            [
                'fee' => ['required', 'numeric', 'min:1000000', 'max:1000000000'],
                'receipt' => ['required', 'max:100']
            ],
            [
                'fee.required' => 'پر کردن این فیلد الزامی است.',
                'fee.min' => 'حداقل مبلغ واریزی یک میلیون تومان است.',
                'fee.max' => 'حداکثر مبلغ واریزی یک میلیارد تومان است.',
                'receipt.required' => 'پر کردن این فیلد الزامی است.',
                'receipt.max' => 'حجم فایل نباید بیشتر از 100 کیلوبایت باشد',
            ]
        );
        $dateTime = explode(' ', now());
        $dateJalali = verta($dateTime[0]);
        $date = explode(' ', $dateJalali);
        $date = implode('/', explode('-', $date[0]));
        $time = $dateTime[1];
        if ($request['receipt']) {
            $receipt = $request->receipt->store('transactionImgs', 'public');
        } else {
            $receipt = null;
        }
        $wallet = wallet::where('user_id', Auth::id())->first();
        if (!$wallet) {
            $wallet = wallet::create([
                'user_id' => Auth::id(),
                'asset' => 0
            ]);
        }
        transaction::create([
            'wallet_id' => $wallet['id'],
            'amount' => $request->fee,
            'type' => 'deposit',
            'isApproved' => 0,
            'receipt' => $receipt,
            'date' => $date,
            'time' => $time,
            'description' => $request->description
        ]);
        return redirect()->back()->with('success',  ' مبلغ ' . $request->fee . ' پس از تایید به کیف پول شما افزوده خواهد شد.');
    }
    public function withdraw($request)
    {
        $request->validate(
            [
                'fee' => ['required', 'numeric', 'min:10000']
            ],
            [
                'fee.required' => 'پر کردن این فیلد الزامی است.',
                'fee.min' => 'حداقل مبلغ قابل برداشت ده هزار تومان است.',
            ]
        );
        $dateTime = explode(' ', now());
        $dateJalali = verta($dateTime[0]);
        $date = explode(' ', $dateJalali);
        $date = implode('/', explode('-', $date[0]));
        $time = $dateTime[1];
        $wallet = wallet::where('user_id', Auth::id())->first();
        $total = 0;
        if ($wallet) {
            $total = $wallet['asset'] - $request['fee'];
        }
        if (!$wallet || $total < 0) {
            return redirect()->back()->with('failure',  'موجودی کیف پول شما کافی نیست.');
        }
        transaction::create([
            'wallet_id' => $wallet['id'],
            'amount' => $request->fee,
            'type' => 'withdraw',
            'date' => $date,
            'time' => $time,
            'isApproved' => 0
        ]);
        return redirect()->back()->with('failure',  ' مبلغ ' . $request->fee . ' پس از تایید از کیف پول شما کسر خواهد شد. ');
    }
    public function transactions(Request $request)
    {
        $user = User::find($request['user_id']);
        $user->walletTransactions;
        return response()->json($user);
    }
    public function transactionsList()
    {
        // $transactions = transaction::all();
        $transactions = transaction::orderBy('date', 'desc')->orderBy('time', 'desc')->get();
        $logo = logo::first();
        foreach ($transactions as $transaction) {
            switch ($transaction->type) {
                case 'deposit':
                    $transaction->type = 'واریز';
                    $transaction->typeColor = '#3aae3f';
                    break;
                case 'withdraw':
                    $transaction->type = 'برداشت';
                    $transaction->typeColor = '#d23334';
                    break;
                case 'buy':
                    $transaction->type = 'خرید';
                    $transaction->typeColor = '#0867d5';
                    break;
                case 'sell':
                    $transaction->type = 'فروش';
                    $transaction->typeColor = '#e57200';
                    break;
            }
            switch ($transaction->isApproved) {
                case -1:
                    $transaction->stateTitle = 'رد شده';
                    $transaction->stateColor = '#d23334';
                    break;
                case 0:
                    $transaction->stateTitle = 'در انتظار';
                    $transaction->stateColor = '#6a6a6a';
                    break;
                case 1:
                    $transaction->stateTitle = 'تایید شده';
                    $transaction->stateColor = '#3aae3f';
                    break;
            }
        }
        return view('admin.transaction.transactionsList', ['logo' => $logo, 'transactions' => $transactions]);
    }
    public function transactionsListSingle(User $user)
    {
        $logo = logo::first();
        return view('admin.transaction.transactionsListSingle', ['user' => $user, 'logo' => $logo]);
    }
    public function submitChanges(Request $request)
    {
        foreach ($request->data as $item) {
            $transaction = transaction::find($item['transaction_id']);
            $transaction->isApproved = $item['isApproved'];
            $transaction->save();
            if ($transaction['isApproved'] == 1) {
                if ($transaction['type'] == 'deposit') {
                    $total = $transaction->amount;
                    $wallet = wallet::find($transaction['wallet_id']);
                    $total += $wallet['asset'];
                    $wallet->asset = $total;
                    $wallet->save();
                }
                if ($transaction['type'] == 'withdraw') {
                    $wallet = wallet::find($transaction['wallet_id']);
                    $total = 0;
                    $total = $wallet['asset'] - $transaction['amount'];
                    $wallet->asset = $total;
                    $wallet->save();
                }
                if ($transaction['type'] == 'buy') {
                    $transaction->deal->update(['isApproved' => $item['isApproved']]);
                }
                if ($transaction['type'] == 'sell') {
                    $transaction->deal->update(['isApproved' => $item['isApproved']]);
                }
            }
            if ($transaction->isApproved == -1) {
                if ($transaction->type == 'buy') {
                    $total = $transaction->amount;
                    $wallet = wallet::find($transaction['wallet_id']);
                    $weight = $transaction->deal->goldWeight;
                    $total += $wallet['asset'];
                    $weight -= $wallet->goldWeight;
                    $wallet->asset = $total;
                    $wallet->goldWeight = $weight;
                    $wallet->save();
                }
                if ($transaction->type == 'sell') {
                    $total = $transaction->amount;
                    $wallet = wallet::find($transaction['wallet_id']);
                    $weight = $transaction->deal->goldWeight;
                    $total -= $wallet['asset'];
                    $weight += $wallet->goldWeight;
                    $wallet->asset = $total;
                    $wallet->goldWeight = $weight;
                    $wallet->save();
                }
            }
        }
        return response()->json();
    }
    public function popupWalletData(Request $request)
    {
        $user = User::find($request->userId)->load('wallet');
        return response()->json($user);
    }
}
