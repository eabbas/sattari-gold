<?php

namespace App\Http\Controllers;

use App\Models\deal;
use App\Models\logo;
use App\Models\transaction;
use App\Models\User;
use App\Models\wallet;
use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\dealTemporary;
use Illuminate\Support\Facades\Auth;
use Log;

class DealController extends Controller
{
    public function create()
    {
        $logo = logo::first();
        $totalGoldWeight = 0;
        if (count(Auth::user()->deals)) {
            foreach (Auth::user()->deals as $deal) {
                $totalGoldWeight += $deal->goldWeight;
            }
        }
        $asset = 0;
        if (Auth::user()->wallet) {
            $asset = Auth::user()->wallet->asset;
        }
        $message=Message::all();
        return view('user.deal.create', ['asset' => $asset, 'totalGoldWeight' => $totalGoldWeight, 'logo' => $logo , "message"=>$message]);
    }


    public function store(Request $request)
    {
        $dateTime = explode(' ', now());
        $dateJalali = verta($dateTime[0]);
        $date = explode(' ', $dateJalali);
        $date = implode('/', explode('-', $date[0]));
        $time = $dateTime[1];
        $action = $request->action;
        $calcBy = $request->calcBy;
        $input = $request->userInput;
        $output = $request->resultOutput;
        $description = $request->description;
        $goldPrice = $request->goldPrice;

        $wallet = Wallet::where('user_id', Auth::id())->first();

        if (!$wallet) {
            return redirect()->back()->with('failure', 'کیف پول یافت نشد.');
        }

        $amount = 0;
        $weight = 0;
        $totalAsset = $wallet->asset;
        $totalGold = $wallet->goldWeight ?? 0;

        $cleanOutput = (float) str_replace(',', '', $output);

        if ($action == 'buy') {
            $buyPrice = 0;
            if ($calcBy == 'price') {
                $amount = (float) $input;
                $weight = $cleanOutput;
                $buyPrice = $input;
            } elseif ($calcBy == 'weight') {
                $weight = (float) $input;
                $amount = $cleanOutput;
                $buyPrice = $amount;
            }
            if ($wallet->asset < $amount) {
                return redirect()->back()->with('failure', 'موجودی کیف پول شما کافی نیست.');
            }

            $totalAsset = $wallet->asset - $amount;
            $totalGold = ($wallet->goldWeight ?? 0) + $weight;

            $transaction = transaction::create([
                'wallet_id' => $wallet->id,
                'amount' => $amount,
                'date' => $date,
                'time' => $time,
                'type' => 'buy',
                'isApproved' => 0,
            ]);

            $id_deal= deal::insertGetId([
                'user_id' => Auth::id(),
                'transaction_id' => $transaction->id,
                'goldWeight' => $weight,
                'goldPrice' => $goldPrice,
                'buyPrice' => $amount,
                'date' => $date,
                'time' => $time,
                'description' => $description
            ]);
            //حسین
            dealTemporary::create([
                'user_id'=>Auth::id(),
                'deal_id'=>$id_deal,
                'goldPrice'=>$request->goldPrice,
                'action'=>$request->action,
                'calcBy'=>$request->calcBy,
                'userInput'=>$request->userInput,
                'resultOutput'=>$request->resultOutput,
            ]);
            return redirect()->back()->with('success', "منتظر تایید");
        }

        if ($action == 'sell') {
            if ($calcBy == 'price') {
                $amount = (float) $input;
                $weight = $cleanOutput;
            } elseif ($calcBy == 'weight') {
                $weight = (float) $input;
                $amount = $cleanOutput;
            }

            if (($wallet->goldWeight ?? 0) < $weight) {
                return redirect()->back()->with('failure', 'موجودی سپرده طلای شما کافی نیست.');
            }

            $totalGold = ($wallet->goldWeight ?? 0) - $weight;
            $totalAsset = $wallet->asset + $amount;

            $transaction = transaction::create([
                'wallet_id' => $wallet->id,
                'amount' => $amount,
                'date' => $date,
                'time' => $time,
                'type' => 'sell',
                'isApproved' => 0,
            ]);
            $newPrice = explode(',', $output);
            $newPrice = implode('', $newPrice);
            deal::create([
                'user_id' => Auth::id(),
                'transaction_id' => $transaction->id,
                'goldWeight' => $weight,
                'goldPrice' => $goldPrice,
                'buyPrice' => $newPrice,
                'date' => $date,
                'time' => $time,
                'description' => $description
            ]);

            $wallet->update([
                'asset' => $totalAsset,
                'goldWeight' => $totalGold
            ]);

            return redirect()->back()->with('success', "$amount ریال به کیف پول شما واریز شد");
        }

        return redirect()->back()->with('failure', 'عملیات نامعتبر است.');
    }

    public function list()
    {
        $logo = logo::first();
        return view('user.deal.myDeals', ['logo' => $logo]);
    }

    public function adminIndex()
    {
        $deals = deal::orderBy('date', 'desc')->orderBy('time', 'desc')->get();
        // dd($deals[0]->transaction);
        foreach ($deals as $deal) {
            switch ($deal->transaction->isApproved) {
                case -1:
                    $deal->state = 'رد شده';
                    $deal->color = '#E85D5D';
                    break;
                case 0:
                    $deal->state = 'در انتظار';
                    $deal->color = '#F5A623';
                    break;
                case 1:
                    $deal->state = 'تایید شده';
                    $deal->color = '#18A878';
                    break;
            }
        }
        $logo = logo::first();
        return view('admin.deal.index', ['logo' => $logo, 'deals' => $deals]);
    }
    public function conferm(deal $deal){
        $deal->isApproved=1;
        $deal->transaction->isApproved=1;
        $deal->transaction->save();
        $deal->save();
        $dealTemporary=dealTemporary::where('deal_id' , $deal->id)->first();
        $action = $dealTemporary->action;
        $calcBy = $dealTemporary->calcBy;
        $input = $dealTemporary->userInput;
        $output = $dealTemporary->resultOutput;
        $goldPrice = $dealTemporary->goldPrice;

        $amount = 0;
        $weight = 0;
        $wallet = Wallet::where('user_id', Auth::id())->first();
        $totalAsset = $wallet->asset;
        $totalGold = $wallet->goldWeight ?? 0;
                $cleanOutput = (float) str_replace(',', '', $output);

        if ($action == 'buy') {
            $buyPrice = 0;
            if ($calcBy == 'price') {
                $amount = (float) $input;
                $weight = $cleanOutput;
                $buyPrice = $input;
            } elseif ($calcBy == 'weight') {
                $weight = (float) $input;
                $amount = $cleanOutput;
                $buyPrice = $amount;
            }
            if ($wallet->asset < $amount) {
                return redirect()->back()->with('failure', 'موجودی کیف پول شما کافی نیست.');
            }
        }
        
        $totalAsset = $wallet->asset - $amount;
        $totalGold = ($wallet->goldWeight ?? 0) + $weight;

        $wallet->update([
            'asset' => $totalAsset,
            'goldWeight' => $totalGold
        ]);
        $dealTemporary=dealTemporary::where('deal_id' , $deal->id)->delete();
        return to_route('deal.adminIndex');
    }
}
