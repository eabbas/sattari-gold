<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\logo;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function create()
    {
        $categories = category::select('id', 'title')->get();
        $logo = logo::first();
        return view('admin.category.create', [
            'categories' => $categories,
            'logo' => $logo,
        ]);
    }
    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'title' => ['required'],
                'image' => ['max:100']
            ],
            [
                'title.required' => 'پر کردن این فیلد الزامی است.',
                'image.max' => 'حجم فایل نباید بیشتر از 100 کیلوبایت باشد',
            ]
        );
        if ($request['image']) {
            $img_path = $request->image->store('categoryImgs', 'public');
        } else {
            $img_path = null;
        }
        category::create([
            'title' => $request->title,
            'description' => $request->description,
            'parent_id' => $request->parent_id,
            'image' => $img_path
        ]);
        return redirect()->back()->with('message', 'دسته بندی جدید برای سایت ایجاد شد.');
    }
    public function adminIndex()
    {
        $cats = category::all();
        $logo = logo::first();
        return view('admin.category.index', [
            'categories' => $cats,
            'logo' => $logo,
        ]);
    }
    public function showChildren($param)
    {
        $text = '<ul class="mr-5">';
        foreach ($param as $child) {
            $text .= '<li class="list-decimal list-inside"><span class="text-sm text-slate-500">' . $child['title'] . '</span></li>';
            if (count($child['children']) > 0) {
                $text .= $this->showChildren($child['children']);
            }
        }
        $text .= "</ul>";
        return $text;
    }
    public function adminShow(Request $request)
    {
        $category = category::find($request['id']);
        $category['subCats'] = $this->showChildren($category->children);
        $category->parent;
        if ($category->image) {
            $category->image = asset('storage/' . $category['image']);
        }
        return response()->json($category);
    }
    public function edit(Request $request)
    {
        $category = category::find($request['id']);
        $categories = category::all();
        if ($category->image) {
            $category->image = asset('storage/' . $category['image']);
        }
        return response()->json(['cat' => $category, 'cats' => $categories]);
    }
    public function update(Request $request)
    {
        $validated = $request->validate(
            [
                'title' => ['required'],
                'image' => ['max:100'],
            ],
            [
                'title.required' => 'پر کردن این فیلد الزامی است.',
                'image.max' => 'حجم فایل نباید بیشتر از 100 کیلوبایت باشد.',
            ]
        );
        if (isset($request['removedImg'])) {
            Storage::disk('public')->delete($request['removedImg']);
            $category = category::where('image', $request['removedImg'])->first();
            $category->image = null;
            $category->save();
        }
        $category = category::find($request['cat_id']);
        if (isset($request['image'])) {
            if ($category['image']) {
                Storage::disk('public')->delete($category['image']);
            }
            $img_path = $request->image->store('categoryImgs', 'public');
        } else {
            $img_path = $category['image'];
        }
        $name = $category->title;
        $category->title = $request['title'];
        $category->description = $request['description'];
        $category->parent_id = $request['parent_id'];
        $category->image = $img_path;
        $category->save();
        return to_route('category.adminIndex')->with('message', 'دسته بندی ' . $name . ' به روزرسانی شد.');
    }
    public function delete($id)
    {
        $category = category::find($id);
        if ($category) {
            if ($category['image']) {
                Storage::disk('public')->delete($category['image']);
            }
            $name = $category['title'];
            $category->delete();
        } else {
            return to_route('category.adminIndex')->with('message', 'چنین دسته بندی وجود ندارد.');
        }
        return to_route('category.adminIndex')->with('message', 'دسته بندی ' . $name . ' حذف شد.');
    }
    public function relatedProducts(category $category)
    {
        $categories = category::with('products')->has('products')->get();
        $products = $category->products;
        foreach ($products as $product) {
            if ($product->media->isNotEmpty()) {
                foreach ($product->media as $media) {
                    if ($media['is_main']) {
                        $product['mainImg']  = $media['media_path'];
                        break;
                    } else {
                        $product['mainImg'] = 'default.jpg';
                    }
                }
            } else {
                $product['mainImg'] = 'default.jpg';
            }
        }
        return view('user.product.index', [
            'currentCat' => $category,
            'categories' => $categories,
            'products' => $products,
        ]);
    }
    public function showSubCats(Request $request)
    {
        $category = category::find($request['catId'])->load('children');
        return response()->json($category);
    }
    public function index()
    {
        $products = product::all();
        $cats = category::all();
        return view('user.category.index', [
            'products' => $products,
            'categories' => $cats,
        ]);
    }
    public function show(category $category)
    {
        $cats = category::all();
        return view('user.category.show', [
            'categories' => $cats,
            'category' => $category,
        ]);
    }
    public function deleteAll(Request $request)
    {
        if (!isset($request->categories)) {
            return redirect()->back();
        }
        foreach ($request->categories as $category_id) {
            $category = category::find($category_id);
            $category->delete();
        }
        return redirect()->back();
    }
}
