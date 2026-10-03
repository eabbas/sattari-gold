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
        $totalGoldWeight = 0;
        if(count(Auth::user()->deals)){
            foreach(Auth::user()->deals as $deal){
                $totalGoldWeight += $deal->goldWeight;
            }
        }
        $asset = 0;
        if(Auth::user()->wallet){
            $asset = Auth::user()->wallet->asset;
        }
        return view('user.deal.create', ['asset' => $asset, 'totalGoldWeight'=>$totalGoldWeight]);
    }

    public function store(Request $request)
    {
        $action = $request->action;  // buy & sell
        $calcBy = $request->calcBy;  // price & weight
        $input = $request->userInput;
        $output = $request->resultOutput;
        $description = $request->description;
        $goldPrice = $request->goldPrice;
        $wallet = wallet::where('user_id', Auth::id())->first();
        $total = 0;
        $amount = 0;
        $dateTime = explode(' ', now());
        $dateJalali = verta($dateTime[0]);
        $date = explode(' ', $dateJalali);
        $date = implode('/', explode('-', $date[0]));
        $time = $dateTime[1];
        $weight =  0;
        if ($action == 'buy') {
            if ($calcBy == 'price') {
                if ($wallet) {
                    $amount = $input;
                    $total = $wallet->asset - $input;
                    $weight = $output;
                }
            }
            if($calcBy == 'weight'){
                if ($wallet) {
                    $outputArr = explode(',', $output);
                    $result = implode('', $outputArr);
                    $amount = $result;
                    $total = $wallet->asset - $result;
                    $weight = $input;
                }
                
            }
            if (!$wallet || $total < 0) {
                return redirect()->back()->with('failure', 'موجودی کیف پول شما کافی نیست.');
            }
            
            $transaction = transaction::create([
                'wallet_id'=>$wallet->id,
                'amount'=>$amount,
                'type'=>'buy',
                'isApproved'=>0,
            ]);

            deal::create([
                'user_id'=>Auth::id(),
                'transaction_id'=>$transaction->id,
                'goldWeight'=>$weight,
                'goldPrice'=>$goldPrice,
                'date'=>$date,
                'time'=>$time,
                'description'=>$description
            ]);
            $wallet->update(['asset'=>$total]);
        }
        if($action == 'sell'){
            //
        }
        return redirect()->back()->with('success', "$weight گرم طلا به سپرده شما افزوده شد");
    }
}
