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
                'title' => ['required'],
                'subTitle' => ['required'],
                'btnText' => ['required'],
                'btnLink' => ['required'],
            ],
            [
                'title.required' => 'پر کردن این فیلد الزامی است.',
                'subTitle.required' => 'پر کردن این فیلد الزامی است.',
                'btnText.required' => 'پر کردن این فیلد الزامی است.',
                'btnLink.required' => 'پر کردن این فیلد الزامی است.',
            ]
        );
        if ($validated) {
            $header = header::first();
            $header_bg_path = null;
            $header_img_path = null;
            if ($header) {
                if (isset($request['header_img'])) {
                    if ($header['header_img']) {
                        Storage::disk('public')->delete($header['header_img']);
                    }
                    $header_img_path = $request->header_img->store('headerImgs', 'public');
                } else {
                    $header_img_path = $header['header_img'];
                }
                if (isset($request['header_bg'])) {
                    if ($header['header_bg']) {
                        Storage::disk('public')->delete($header['header_bg']);
                    }
                    $header_bg_path = $request->header_bg->store('headerImgs', 'public');
                } else {
                    $header_bg_path = $header['header_bg'];
                }
            }
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
            return to_route('header.create')->with('message', 'هدر جدید برای سایت ایجاد شد.');
        }
    }
}
