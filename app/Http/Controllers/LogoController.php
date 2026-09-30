<?php

namespace App\Http\Controllers;

use App\Models\logo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LogoController extends Controller
{
    public function create()
    {
        $logo = logo::first();
        return view('admin.settings.logo.create', ['logo' => $logo]);
    }
    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'logo' => ['required', 'max:50'],
                'link' => ['required']
            ],
            [
                'logo.required' => 'پر کردن این فیلد الزامی است.',
                'logo.max' => 'حجم فایل نباید بیشتر از 50 کیلوبایت باشد.',
                'link.required' => 'پر کردن این فیلد الزامی است.'
            ]
        );
        if ($validated) {
            $logo = logo::first();
            if ($logo) {
                Storage::disk('public')->delete($logo->logo);
            }
            $logo_path = $request->logo->store('logoImgs', 'public');
            logo::updateOrCreate(
                ['id' => 1],
                [
                    'logo' => $logo_path,
                    'link' => $request->link
                ]
            );
            return to_route('settings.logo.create')->with('message', 'لوگوی جدید برای سایت ایجاد شد.');
        }
    }
}
