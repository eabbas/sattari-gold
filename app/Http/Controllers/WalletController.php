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
        return view('user.user.wallet', ['user' => $user]);
    }
    public function deposit(Request $request)
    {
        $request->validate(
            [
                'depositPrice' => ['required', 'numeric', 'min:1000000', 'max:1000000000'],
                'receipt' => ['required', 'max:100']
            ],
            [
                'depositPrice.required' => 'پر کردن این فیلد الزامی است.',
                'depositPrice.min' => 'حداقل مبلغ واریزی یک میلیون تومان است.',
                'depositPrice.max' => 'حداکثر مبلغ واریزی یک میلیارد تومان است.',
                'receipt.required' => 'پر کردن این فیلد الزامی است.',
                'receipt.max' => 'حجم فایل نباید بیشتر از 100 کیلوبایت باشد',
            ]
        );
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
            'amount' => $request->depositPrice,
            'type' => 'deposit',
            'isApproved' => 0,
            'receipt' => $receipt
        ]);
        return redirect()->back()->with('success',  ' مبلغ ' . $request->depositPrice . ' پس از تایید به کیف پول شما افزوده خواهد شد.');
    }
    // public function saveDeposit($request)
    // {
    //     $total = $request->amount;
    //     $wallet = wallet::where('user_id', Auth::id())->first();
    //     $total += $wallet['asset'];
    //     $wallet->asset = $total;
    //     $wallet->save();
    // }
    public function withdraw(Request $request)
    {
        $request->validate(
            [
                'withdrawPrice' => ['required', 'numeric', 'min:10000']
            ],
            [
                'withdrawPrice.required' => 'پر کردن این فیلد الزامی است.',
                'withdrawPrice.min' => 'حداقل مبلغ قابل برداشت ده هزار تومان است.',
            ]
        );
        $wallet = wallet::where('user_id', Auth::id())->first();
        $total = 0;
        if ($wallet) {
            $total = $wallet['asset'] - $request['withdrawPrice'];
        }
        if (!$wallet || $total < 0) {
            return redirect()->back()->with('failure',  'موجودی کیف پول شما کافی نیست.');
        }
        transaction::create([
            'wallet_id' => $wallet['id'],
            'amount' => $request->withdrawPrice,
            'type' => 'withdraw',
            'isApproved' => 0
        ]);
        return redirect()->back()->with('failure',  ' مبلغ ' . $request->withdrawPrice . ' پس از تایید از کیف پول شما کسر خواهد شد. ');
    }
    // public function takeWithdraw($request)
    // {
    //     $wallet = wallet::where('user_id', Auth::id())->first();
    //     $total = 0;
    //     $total = $wallet['asset'] - $request['amount'];
    //     $wallet->asset = $total;
    //     $wallet->save();
    // }
    public function transactions(Request $request)
    {
        $user = User::find($request['user_id']);
        $user->walletTransactions;
        return response()->json($user);
    }
    public function transactionsList()
    {
        $users = User::all();
        $logo = logo::first();
        return view('admin.user.transactionsList', ['users' => $users, 'logo' => $logo]);
    }
    public function transactionsListSingle(User $user)
    {
        return view('admin.user.transactionsListSingle', ['user' => $user]);
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
                    $transaction->deal->update(['isApproved'=>$item['isApproved']]);
                }
            }
        }
        return response()->json();
    }
}
