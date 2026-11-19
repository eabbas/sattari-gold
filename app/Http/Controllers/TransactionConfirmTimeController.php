<?php

namespace App\Http\Controllers;

use App\Models\logo;
use App\Models\transactionConfirmTime;
use Illuminate\Http\Request;

class TransactionConfirmTimeController extends Controller
{
    public function create()
    {
        $logo = logo::first();
        $time = transactionConfirmTime::first();
        return view('admin.transactionConfirmTime.create', ['logo' => $logo, 'time' => $time]);
    }
    public function store(Request $request)
    {
        transactionConfirmTime::updateOrCreate(
            ['id' => 1],
            ['time' => $request->time]
        );
        return redirect()->back()->with('success', 'زمان تایید معامله با موفقیت ثبت شد.');
    }
}
