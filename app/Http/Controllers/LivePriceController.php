<?php

namespace App\Http\Controllers;

use App\Models\livePrice;
use App\Models\logo;
use App\Models\priceLine;
use App\Models\referenceSites;
use Illuminate\Http\Request;

class LivePriceController extends Controller
{
    public function create()
    {
        $logo = logo::first();
        $sites = referenceSites::all();
        $price = livePrice::with('referenceSite')->first();
        $line = priceLine::first();
        if ($price) {
            if ($line) {
                if ($price->difference_type == 'line') {
                    $buyDifference = $price->buy_difference * $line->line_value;
                    $price['buy_price'] = $price->price + $buyDifference;
                    $sellDifference = $price->sell_difference * $line->line_value;
                    $price['sell_price'] = $price->price + $sellDifference;
                }
            }
            if ($price->difference_type == 'percent') {
                $buyDifference = ($price->buy_difference / 100) * $price->price;
                $price['buy_price'] = $price->price + $buyDifference;
                $sellDifference = ($price->sell_difference / 100) * $price->price;
                $price['sell_price'] = $price->price + $sellDifference;
            }
        }
        return view('admin.livePrice.create', ['logo' => $logo, 'sites' => $sites, 'price' => $price, 'line' => $line]);
    }
    public function store(Request $request)
    {
        // dd($request->all());
        livePrice::updateOrCreate(
            ['id' => 1],
            [
                'price' => $request->price,
                'update_mode' => $request->update_mode,
                'referenceSite_id' => $request->reference_source,
                'difference_type' => $request->difference_type,
                'buy_difference' => $request->buy_difference,
                'sell_difference' => $request->sell_difference,
            ]
        );
        return redirect()->back()->with('success', 'قیمت با موفقیت ثبت شد.');
    }
}
