<?php

namespace App\Http\Controllers;

use App\Models\logo;
use App\Models\referenceSites;
use Illuminate\Http\Request;

class ReferenceSitesController extends Controller
{
    public function create()
    {
        $referenceSites = referenceSites::all();
        $logo = logo::first();
        return view('admin.referenceSite.create', ['referenceSites' => $referenceSites, 'logo' => $logo]);
    }
    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'address' => ['required'],
                'title' => ['required']
            ],
            [
                'address.required' => 'پر کردن این فیلد الزامی است.',
                'title.required' => 'پر کردن این فیلد الزامی است.'
            ]
        );
        referenceSites::create($request->all());
        return redirect()->back()->with('message', 'سایت مرجع جدید اضافه شد.');
    }
    public function delete(referenceSites $site)
    {
        $title = $site->title;
        $site->delete();
        return redirect()->back()->with('message', ' سایت مرجع ' . $title . ' حذف شد ');
    }
    public function update(Request $request)
    {
        $validated = $request->validate(
            [
                'editAddress' => ['required'],
                'editTitle' => ['required']
            ],
            [
                'editAddress.required' => 'پر کردن این فیلد الزامی است.',
                'editTitle.required' => 'پر کردن این فیلد الزامی است.'
            ]
        );
        $site = referenceSites::find($request->site_id);
        $title = $site->title;
        $site->address = $request->editAddress;
        $site->title = $request->editTitle;
        $site->save();
        return redirect()->back()->with('message', ' سایت مرجع ' . $title . ' به روزرسانی شد. ');
    }
}
