<?php

namespace App\Http\Controllers;

use App\Models\logo;
use App\Models\transactionSetting;
use Illuminate\Http\Request;

class TransactionSettingController extends Controller
{
    public function create()
    {
        $logo = logo::first();
        $setting = transactionSetting::first();
        return view('admin.transaction.settings', ['logo' => $logo, 'setting' => $setting]);
    }
    public function updateOrCreate(Request $request)
    {
        $validated = $request->validate(
            [
                'minDepositAmount' => ['required',],
                'maxDepositAmount' => ['required',],
                'minWithdrawAmount' => ['required'],
                'maxWithdrawAmount' => ['required'],
            ],
            [
                'minDepositAmount.required' => 'پر کردن این فیلد الزامی است.',
                'maxDepositAmount.required' => 'پر کردن این فیلد الزامی است.',
                'minWithdrawAmount.required' => 'پر کردن این فیلد الزامی است.',
                'maxWithdrawAmount.required' => 'پر کردن این فیلد الزامی است.',
            ]
        );
        transactionSetting::updateOrCreate(
            ['id' => 1],
            [
                'depositIsActive' => $request->depositIsActive ?? 0,
                'withdrawIsActive' => $request->withdrawIsActive ?? 0,
                'minDepositAmount' => $request->minDepositAmount,
                'maxDepositAmount' => $request->maxDepositAmount,
                'minWithdrawAmount' => $request->minWithdrawAmount,
                'maxWithdrawAmount' => $request->maxWithdrawAmount,
            ]
        );
        return redirect()->back()->with('success', 'تغییرات با موفقیت ذخیره شدند.');
    }
}
