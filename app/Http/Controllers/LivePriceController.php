<?php

namespace App\Http\Controllers;

use App\Models\livePrice;
use App\Models\logo;
use App\Models\referenceSites;
use Illuminate\Http\Request;

class LivePriceController extends Controller
{
    public function create()
    {
        $logo = logo::first();
        $sites = referenceSites::all();
        $price = livePrice::with('referenceSite')->first();
        // return $price;
        return view('admin.livePrice.create', ['logo' => $logo, 'sites' => $sites, 'price' => $price]);
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
