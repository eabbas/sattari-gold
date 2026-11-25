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
use App\Models\livePrice;
use App\Models\priceLine;
use App\Models\segment;
use Illuminate\Support\Facades\Auth;
use Log;

class DealController extends Controller
{
    public function create()
    {
        $logo = logo::first();
        $totalGoldWeight = 0;
        isset(Auth::user()->wallet) ? $totalGoldWeight = Auth::user()->wallet->goldWeight : $totalGoldWeight = 0;
        $asset = 0;
        if (Auth::user()->wallet) {
            $asset = Auth::user()->wallet->asset;
        }
        $segment = segment::where('en_name', 'deal_create')->first();
        $messages = [];
        if ($segment) {
            $messages = Message::where('segment_id', $segment->id)->where('status', 1)->get();
        }
        $price = livePrice::first();
        if ($price) {
            if ($price->difference_type == 'line') {
                $line = priceLine::first();
                $buyDifference = $price->buy_difference * $line?->line_value;
                $price['buy_price'] = $price->price + $buyDifference;
                $sellDifference = $price->sell_difference * $line?->line_value;
                $price['sell_price'] = $price->price + $sellDifference;
            }
            if ($price->difference_type == 'percent') {
                $buyDifference = ($price->buy_difference / 100) * $price->price;
                $price['buy_price'] = $price->price + $buyDifference;
                $sellDifference = ($price->sell_difference / 100) * $price->price;
                $price['sell_price'] = $price->price + $sellDifference;
            }
        }
        $deals = deal::where('user_id', Auth::id())->orderBy('date', 'desc')->orderBy('time', 'desc')->get();
        // dd($deals);
        return view('user.deal.create', ['asset' => $asset, 'totalGoldWeight' => $totalGoldWeight, 'logo' => $logo, "messages" => $messages, 'price' => $price, 'deals'=>$deals]);
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
        $userId = $request->input('userId', Auth::id());

        $wallet = Wallet::where('user_id', $userId)->first();

        if (!$wallet) {
            return redirect()->back()->with('failure', 'کیف پول یافت نشد.');
        }

        $amount = 0;
        $weight = 0;
        // accept method
        // $totalAsset = $wallet->asset;
        // $totalGold = $wallet->goldWeight ?? 0;

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

            deal::create([
                'user_id' => $userId,
                'transaction_id' => $transaction->id,
                'goldWeight' => $weight,
                'goldPrice' => $goldPrice,
                'buyPrice' => $amount,
                'date' => $date,
                'time' => $time,
                'description' => $description
            ]);
            //حسین
            // dealTemporary::create([
            //     'user_id' => $userId,
            //     'deal_id' => $id_deal,
            //     'goldPrice' => $request->goldPrice,
            //     'action' => $request->action,
            //     'calcBy' => $request->calcBy,
            //     'userInput' => $request->userInput,
            //     'resultOutput' => $request->resultOutput,
            // ]);

            return redirect()->back()->with('success',  "معامله شما پس از تایید مدیریت ثبت خواهد شد.");
        }

        if ($action == 'sell') {
            if ($calcBy == 'price') {
                $amount = (float) $input;
                $weight = $cleanOutput;
            } elseif ($calcBy == 'weight') {
                $weight = (float) $input;
                $amount = $cleanOutput;
            }
            // amount = final price

            if (($wallet->goldWeight ?? 0) < $weight) {
                return redirect()->back()->with('failure', 'موجودی سپرده طلای شما کافی نیست.');
            }

            // accept method
            // $totalGold = ($wallet->goldWeight ?? 0) - $weight;
            // $totalAsset = $wallet->asset + $amount;

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
                'user_id' => $userId,
                'transaction_id' => $transaction->id,
                'goldWeight' => $weight,
                'goldPrice' => $goldPrice,
                'buyPrice' => $newPrice,
                'date' => $date,
                'time' => $time,
                'description' => $description
            ]);


            // بعد از تایید
            // $wallet->update([
            //     'asset' => $totalAsset,
            //     'goldWeight' => $totalGold
            // ]);

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
    public function confirm(deal $deal)
    {
        // dd($transaction , $deal);
        $transaction = transaction::find($deal->transaction_id);
        $wallet = Wallet::find($transaction->wallet_id);
        $amount = 0;
        $weight = 0;
        $totalAsset = $wallet->asset ?? 0;
        $totalGold = $wallet->goldWeight ?? 0;
        if ($transaction->type == 'buy') {
            $totalAsset = $wallet->asset - $amount;
            $totalGold = ($wallet->goldWeight ?? 0) + $weight;
            $wallet->update([
                'asset' => $totalAsset,
                'goldWeight' => $totalGold
            ]);
        }
        if ($transaction->type == 'sell') {
            $totalAsset = $wallet->asset + $amount;
            $totalGold = ($wallet->goldWeight ?? 0) - $weight;
            $wallet->update([
                'asset' => $totalAsset,
                'goldWeight' => $totalGold
            ]);
        }
        $transaction->update(['isApproved'=>1, 'updated_at'=>now()]);
        $deal->update(['isApproved'=>1, 'updated_at'=>now()]);
    
        return to_route('deal.adminIndex');
    }
    public function cancel(Request $request)
    {
        $deal = deal::find($request->id);
        $deal->isApproved = -1;
        $deal->message = $request->message;
        $trancsavtion = transaction::find($deal->transaction_id);
        $trancsavtion->isApproved = -1;
        $trancsavtion->save();
        $deal->save();
        return to_route('deal.adminIndex');
    }
}
