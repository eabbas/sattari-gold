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
        // return $logo;
        return view('admin.settings.logo.create', ['logo' => $logo]);
    }
    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'link' => ['required']
            ],
            [
                'link.required' => 'پر کردن این فیلد الزامی است.'
            ]
        );
        if ($validated) {
            $logo = logo::first();
            $logo_path = null;
            if ($logo) {
                if (isset($request['logo'])) {
                    if ($logo['logo']) {
                        Storage::disk('public')->delete($logo['logo']);
                    }
                    $logo_path = $request->logo->store('logoImgs', 'public');
                } else {
                    $logo_path = $logo['logo'];
                }
            }
            logo::updateOrCreate(
                ['id' => 1],
                [
                    'logo' => $logo_path,
                    'link' => $request->link
                ]
            );
            return to_route('logo.create')->with('message', 'لوگوی جدید برای سایت ایجاد شد.');
        }
    }
}
