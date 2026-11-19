<?php

namespace App\Http\Controllers;

use App\Models\logo;
use App\Models\priceLine;
use Illuminate\Http\Request;

class PriceLineController extends Controller
{
    public function create()
    {
        $priceLine = priceLine::first();
        $logo = logo::first();
        return view('admin.priceLine.create', ['logo' => $logo, 'priceLine' => $priceLine]);
    }
    public function store(Request $request)
    {
        $request->validate(
            [
                'line_value' => ['required']
            ],
            [
                'line_value' => 'پر کردن این فیلد الزامی است.'
            ]
        );
        priceLine::updateOrCreate(
            ['id' => 1],
            ['line_value' => $request->line_value]
        );
        return redirect()->back()->with('success', 'ارزش خط با موفقیت ثبت شد');
    }
}
