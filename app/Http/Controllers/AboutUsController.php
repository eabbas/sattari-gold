<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
use App\Models\aboutUs;
use App\Models\aboutUsValue;
use App\Models\aboutUsGallery;
use App\Models\logo;
use Illuminate\Support\Facades\Storage;


class AboutUsController extends Controller{
    public function create(){
        $logo = logo::first();
        $aboutUs = aboutUs::first();
        $categories = category::with('products')->has('products')->get();
        if($aboutUs){
            $aboutUs->value;
            $aboutUs->gallery;
            return view('admin.settings.aboutUs.create' , ['logo' => $logo, 'categories' => $categories, 'aboutUs'=>$aboutUs]);
        }
        return view('admin.settings.aboutUs.create' , ['logo' => $logo, 'categories' => $categories]);
    }
    public function store(Request $request){
        if($request->create){
            $validated = $request->validate(
                [
                    'title' => ['required'],
                    'description' => ['nullable'],
                    'ourStory' => ['nullable'],
                    'video' => ['nullable'],
                    'title1' => ['nullable'],
                    'description1' => ['nullable'],
                    'imagecord1' => ['nullable'],
                    'title2' => ['nullable'],
                    'description2' => ['nullable'],
                    'imagecord2' => ['nullable'],
                    'title3' => ['nullable'],
                    'description3' => ['nullable'],
                    'imagecord3' => ['nullable'],
                    'title4' => ['nullable'],
                    'description4' => ['nullable'],
                    'imagecord4' => ['nullable'],
                    'image1' => ['nullable'],
                    'image2' => ['nullable'],
                ],
                [
                'title.required' => 'پر کردن این فیلد الزامی است.',
                ]
            );
        }
        $img_path=null;
        if (isset($request->video)) {
            $img_path = $request->file('video')->store('video', 'public');
        }
        $aboutUs=aboutUs::updateOrCreate(
            ['id'=>1],
            [
            'title'=>$request->title,
            'description'=>$request->description,
            'ourStory'=>$request->ourStory,
            'video'=>$img_path
        ]);
        
        $img_path1=null;
        if (isset($request->imagecord1)) {
            $img_path1 = $request->file('imagecord1')->store('imageaboutUs', 'public');
        }
        aboutUsValue::updateOrCreate(
            ['id'=>1],
            [
            'title'=>$request->title1,
            'description'=>$request->description1,
            'image'=>$img_path1,
            'aboutUs_id'=>$aboutUs->id
        ]);

        $img_path2=null;
        if (isset($request->imagecord2)) {
            $img_path2 = $request->file('imagecord2')->store('imageaboutUs', 'public');
        }
        aboutUsValue::updateOrCreate(
            ['id'=>2],
            [
            'title'=>$request->title2,
            'description'=>$request->description2,
            'image'=>$img_path2,
            'aboutUs_id'=>$aboutUs->id
        ]);

        $img_path3=null;
        if (isset($request->imagecord3)) {
            $img_path3 = $request->file('imagecord3')->store('imageaboutUs', 'public');
        }
        aboutUsValue::updateOrCreate(
            ['id'=>3],
            [
            'title'=>$request->title3,
            'description'=>$request->description3,
            'image'=>$img_path3,
            'aboutUs_id'=>$aboutUs->id
        ]);

        $img_path4=null;
        if (isset($request->imagecord4)) {
            $img_path4 = $request->file('imagecord4')->store('imageaboutUs', 'public');
        }
        aboutUsValue::updateOrCreate(
            ['id'=>4],
            [
            'title'=>$request->title4,
            'description'=>$request->description4,
            'image'=>$img_path4,
            'aboutUs_id'=>$aboutUs->id
        ]);

        $img1=null;
        if (isset($request->image1)) {
            $img1 = $request->file('image1')->store('imageaboutUs', 'public');
        }
        aboutUsGallery::updateOrCreate(
            ['id'=>1],
            [
            'image'=>$img1,
            'flag'=>1,
            'aboutUs_id'=>$aboutUs->id
        ]);

        $img2=null;
        if (isset($request->image2)) {
            $img2 = $request->file('image1')->store('imageaboutUs', 'public');
        }
        aboutUsGallery::updateOrCreate(
            ['id'=>2],
            [
            'image'=>$img2,
            'flag'=>1,
            'aboutUs_id'=>$aboutUs->id
        ]);
        if(isset($request->gallery)){

            foreach($request->gallery as $gallery){
                $path=$gallery->store('imageaboutUs', 'public');
                aboutUsGallery::create([
                    'image'=>$path,
                    'flag'=>0,
                    'aboutUs_id'=>$aboutUs->id
                ]);
            }
        }
        return redirect()->back()->with('success', 'درباره ما افزوده شد');
    }
    public function aboutUs()
    {
        $aboutUs=aboutUs::first();
        $logo = logo::first();
        $categories = category::with('products')->has('products')->get();
        if($aboutUs){
            $aboutUs->value;
            $aboutUs->gallery;
            return view('aboutUs', ['logo' => $logo, 'categories' => $categories, 'aboutUs'=>$aboutUs]);
        }
        return view('aboutUs', ['logo'=>$logo, 'categories'=>$categories]);
    }
    // public function edit(aboutUs $id){
    //     $id->value;
    //     $id->gallery;
    //     $logo = logo::first();
    //     $categories = category::with('products')->has('products')->get();
    //     return view('admin.settings.aboutUs.edit' , ['logo' => $logo, 'categories' => $categories, 'aboutUs'=>$id]);
    // }
    public function delete(Request $request){
        aboutUsGallery::find($request->id)->delete();
        return response()->json('ok');
    }
}
