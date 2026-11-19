<?php

namespace App\Http\Controllers;

use App\Models\currency;
use App\Models\logo;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    public function create()
    {
        $logo = logo::first();
        $currency = currency::first();
        // return $currency;
        return view('admin.currency.create', ['logo' => $logo, 'currency' => $currency]);
    }
    public function store(Request $request)
    {
        currency::updateOrCreate(
            ['id' => 1],
            ['unit' => $request->currency]
        );
        return redirect()->back()->with('success', 'واحد پولی با موفقیت ثبت شد.');
    }
}
