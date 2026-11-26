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
        $categories = category::with('products')->has('products')->get();
        return view('admin.settings.aboutUs.create' , ['logo' => $logo, 'categories' => $categories]);
    }
    public function store(Request $request){
        // dd($request->all());
        if($request->create){
            $validated = $request->validate(
                [
                    'title' => ['required'],
                    'description' => ['required'],
                    'ourStory' => ['required'],
                    'video' => ['required'],
                    'title1' => ['required'],
                    'description1' => ['required'],
                    'imagecord1' => ['required'],
                    'title2' => ['required'],
                    'description2' => ['required'],
                    'imagecord2' => ['required'],
                    'title3' => ['required'],
                    'description3' => ['required'],
                    'imagecord3' => ['required'],
                    'title4' => ['required'],
                    'description4' => ['required'],
                    'imagecord4' => ['required'],
                    'image1' => ['required'],
                    'image2' => ['required'],
                ],
                [
                'title.required' => 'پر کردن این فیلد الزامی است.',
                'description.required' => 'پر کردن این فیلد الزامی است.',
                'ourStory.required' => 'پر کردن این فیلد الزامی است.',
                'video.required' => 'پر کردن این فیلد الزامی است.',
                'title1.required' => 'پر کردن این فیلد الزامی است.',
                'description1.required' => 'پر کردن این فیلد الزامی است.',
                'imagecord1.required' => 'پر کردن این فیلد الزامی است.',
                'title2.required' => 'پر کردن این فیلد الزامی است.',
                'description2.required' => 'پر کردن این فیلد الزامی است.',
                'imagecord2.required' => 'پر کردن این فیلد الزامی است.',
                'title3.required' => 'پر کردن این فیلد الزامی است.',
                'description3.required' => 'پر کردن این فیلد الزامی است.',
                'imagecord3.required' => 'پر کردن این فیلد الزامی است.',
                'title4.required' => 'پر کردن این فیلد الزامی است.',
                'description4.required' => 'پر کردن این فیلد الزامی است.',
                'imagecord4.required' => 'پر کردن این فیلد الزامی است.',
                'image1.required' => 'پر کردن این فیلد الزامی است.',
                'image2.required' => 'پر کردن این فیلد الزامی است.',

                ]
            );
        }
        $img_path=null;
        if ($request->video) {
            $img_path = $request->file('video')->store('video', 'public');
        }else{
            $img_path=$request->subvideo;
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
        if ($request->imagecord1) {
            $img_path1 = $request->file('imagecord1')->store('imageaboutUs', 'public');
        }else{
            $img_path1=$request->subimagecord1;
        }
        // dd($img_path1);
        aboutUsValue::updateOrCreate(
            ['id'=>1],
            [
            'title'=>$request->title1,
            'description'=>$request->description1,
            'image'=>$img_path1,
            'aboutUs_id'=>$aboutUs->id
        ]);

        $img_path2=null;
        if ($request->imagecord2) {
            $img_path2 = $request->file('imagecord2')->store('imageaboutUs', 'public');
        }else{
            $img_path2=$request->subimagecord2;
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
        if ($request->imagecord3) {
            $img_path3 = $request->file('imagecord3')->store('imageaboutUs', 'public');
        }else{
            $img_path3=$request->subimagecord3;
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
        if ($request->imagecord4) {
            $img_path4 = $request->file('imagecord4')->store('imageaboutUs', 'public');
        }else{
            $img_path4=$request->subimagecord4;
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
        if ($request->image1) {
            $img1 = $request->file('image1')->store('imageaboutUs', 'public');
        }else{
            $img1=$request->subimage1;
        }
        aboutUsGallery::updateOrCreate(
            ['id'=>1],
            [
            'image'=>$img1,
            'flag'=>1,
            'aboutUs_id'=>$aboutUs->id
        ]);

        $img2=null;
        if ($request->image2) {
            $img2 = $request->file('image1')->store('imageaboutUs', 'public');
        }else{
            $img2=$request->subimage2;
        }
        aboutUsGallery::updateOrCreate(
            ['id'=>2],
            [
            'image'=>$img2,
            'flag'=>1,
            'aboutUs_id'=>$aboutUs->id
        ]);
        if($request->gallery){

            foreach($request->gallery as $gallery){
                $path=$gallery->store('imageaboutUs', 'public');
                aboutUsGallery::create([
                    'image'=>$path,
                    'flag'=>0,
                    'aboutUs_id'=>$aboutUs->id
                ]);
            }
        }
        return to_route('aboutUs.aboutUs');
    }
    public function aboutUs()
    {
        $aboutUs=aboutUs::all()->first()->load('value');
        $aboutUs->gallery;
        // dd($aboutUs);
        $logo = logo::first();
        $categories = category::with('products')->has('products')->get();
        return view('aboutUs', ['logo' => $logo, 'categories' => $categories, 'aboutUs'=>$aboutUs]);
    }
    public function edit(aboutUs $id){
        $id->value;
        $id->gallery;
        $logo = logo::first();
        $categories = category::with('products')->has('products')->get();
        return view('admin.settings.aboutUs.edit' , ['logo' => $logo, 'categories' => $categories, 'aboutUs'=>$id]);
    }
    public function delete(Request $request){
        aboutUsGallery::find($request->id)->delete();
        return response()->json('ok');
    }
}
