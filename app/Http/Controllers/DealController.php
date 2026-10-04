<?php

namespace App\Http\Controllers;

use App\Models\deal;
use App\Models\logo;
use App\Models\transaction;
use App\Models\User;
use App\Models\wallet;
use Illuminate\Http\Request;
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
        return view('user.deal.create', ['asset' => $asset, 'totalGoldWeight' => $totalGoldWeight, 'logo' => $logo]);
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
            if ($calcBy == 'price') {
                $amount = (float) $input;  
                $weight = $cleanOutput;  
            } elseif ($calcBy == 'weight') {
                $weight = (float) $input; 
                $amount = $cleanOutput;  
            }

            if ($wallet->asset < $amount) {
                return redirect()->back()->with('failure', 'موجودی کیف پول شما کافی نیست.');
            }

            $totalAsset = $wallet->asset - $amount;
            $totalGold = ($wallet->goldWeight ?? 0) + $weight;

            $transaction = transaction::create([
                'wallet_id' => $wallet->id,
                'amount' => $amount,
                'type' => 'buy',
                'isApproved' => 0,
            ]);

            deal::create([
                'user_id' => Auth::id(),
                'transaction_id' => $transaction->id,
                'goldWeight' => $weight,
                'goldPrice' => $goldPrice,
                'date' => $date,
                'time' => $time,
                'description' => $description
            ]);

            $wallet->update([
                'asset' => $totalAsset,
                'goldWeight' => $totalGold
            ]);
            Log::info($wallet->goldWeight);

            return redirect()->back()->with('success', "$weight گرم طلا به سپرده شما افزوده شد");
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
                'type' => 'sell',
                'isApproved' => 0,
            ]);

            deal::create([
                'user_id' => Auth::id(),
                'transaction_id' => $transaction->id,
                'goldWeight' => $weight,
                'goldPrice' => $goldPrice,
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
        $deals = deal::all();
        $logo = logo::first();
        return view('admin.deal.index', ['logo' => $logo, 'deals' => $deals]);
    }
}
