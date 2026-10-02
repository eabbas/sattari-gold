<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\header;
use App\Models\logo;
use App\Models\menu;
use App\Models\product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function pageNotFound()
    {
        return view('404');
    }
    public function index()
    {
        $header = header::first();
        $menus = menu::where('parent_id', 0)->where('status', 1)->get();
        $products = product::where('show_in_home', 1)->get();
        $categories = category::with('products')->has('products')->get();
        // $categories = category::all();
        $logo = logo::first();
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
        // return $products;
        return view('home', [
            'header' => $header,
            'menus' => $menus,
            'products' => $products,
            'categories' => $categories,
            'logo' => $logo,
        ]);
    }
}
