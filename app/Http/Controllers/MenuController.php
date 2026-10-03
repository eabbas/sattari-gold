<?php

namespace App\Http\Controllers;

use App\Models\logo;
use App\Models\menu;
use Illuminate\Auth\RequestGuard;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function create()
    {
        $menu = menu::all();
        $logo = logo::first();
        return view('admin.settings.menu.create', ['menu' => $menu, 'logo' => $logo]);
    }
    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'title' => ['required'],
                'link' => ['required']
            ],
            [
                'title.required' => 'پر کردن این فیلد الزامی است.',
                'link.required' => 'پر کردن این فیلد الزامی است.',
            ]
        );
        menu::create([
            'title' => $request->title,
            'link' => $request->link,
            'parent_id' => $request->parent_id,
            'status' => $request['status'] ?? 0
        ]);
        return redirect()->back()->with('message', 'منوی جدید برای سایت ایجاد شد.');
    }
    public function delete($id)
    {
        $result = $this->getChildrenIds($id);
        return $result;
        $array = explode('/', $result);
        menu::whereIn('id', $array)->delete();
        return to_route('settings.menu.create')->with('message', 'منوی انتخاب شده به همراه زیر منوهایش حذف شدند.');
    }
    public function getChildrenIds($id)
    {
        $menu = menu::find($id);
        $text = $menu['id'];
        foreach ($menu->children as $item) {
            $text .=  '/' . $item['id'];
            foreach ($item->children as $child) {
                $text .=  '/' . $this->getChildrenIds($child['id']);
            }
        }
        return $text;
    }
    public function deleteAll(Request $request)
    {
        dd($request->all());
    }
    public function edit(Request $request)
    {
        $menu = menu::find($request['id']);
        $menus = menu::all();
        return response()->json(['menu' => $menu, 'menus' => $menus]);
    }
    public function update(Request $request)
    {
        $validated = $request->validate(
            [
                'menuTitle' => ['required'],
                'menuLink' => ['required']
            ],
            [
                'menuTitle.required' => 'پر کردن این فیلد الزامی است.',
                'menuLink.required' => 'پر کردن این فیلد الزامی است.',
            ]
        );
        $menu = menu::find($request['menu_id']);
        $menu->title = $request['menuTitle'];
        $menu->link = $request['menuLink'];
        $menu->parent_id = $request['menuParent_id'];
        $menu->status = $request['menuStatus'] ?? 0;
        $menu->save();
        return redirect()->back()->with('message', 'منوی ' . $menu->title . ' به روز رسانی شد.');
    }
}
