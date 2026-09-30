<?php

namespace App\Http\Controllers;

use App\Models\header;
use App\Models\logo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HeaderController extends Controller
{
    public function create()
    {
        $header = header::first();
        $logo = logo::first();
        return view('admin.settings.header.create', ['header' => $header, 'logo' => $logo]);
    }
    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                // ! حجم عکس ها قراره 100 کیلوبایت باشه
                'header_img' => ['required', 'max:500'],
                'header_bg' => ['required', 'max:500'],
                'title' => ['required'],
                'subTitle' => ['required'],
                'btnText' => ['required'],
                'btnLink' => ['required'],
            ],
            [
                'header_img.required' => 'پر کردن این فیلد الزامی است.',
                'header_img.max' => 'حجم فایل نباید بیشتر از 100 کیلوبایت باشد.',
                'header_bg.required' => 'پر کردن این فیلد الزامی است.',
                'header_bg.max' => 'حجم فایل نباید بیشتر از 100 کیلوبایت باشد.',
                'title.required' => 'پر کردن این فیلد الزامی است.',
                'subTitle.required' => 'پر کردن این فیلد الزامی است.',
                'btnText.required' => 'پر کردن این فیلد الزامی است.',
                'btnLink.required' => 'پر کردن این فیلد الزامی است.',
            ]
        );
        // dd($request->all());
        if ($validated) {
            $header = header::first();
            if ($header) {
                Storage::disk('public')->delete($header->header_img);
                Storage::disk('public')->delete($header->header_bg);
            }
            $header_img_path = $request->header_img->store('headerImgs', 'public');
            $header_bg_path = $request->header_bg->store('headerImgs', 'public');
            header::updateOrCreate(
                ['id' => 1],
                [
                    'header_img' => $header_img_path,
                    'header_bg' => $header_bg_path,
                    'title' => $request->title,
                    'subTitle' => $request->subTitle,
                    'btnText' => $request->btnText,
                    'btnLink' => $request->btnLink,
                ]
            );
            return to_route('settings.header.create')->with('message', 'هدر جدید برای سایت ایجاد شد.');
        }
    }
}
