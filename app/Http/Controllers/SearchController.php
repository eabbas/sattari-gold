<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\product;
use App\Models\logo;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function getFilters(Request $request)
    {
        $filters = $request->input('filters');
        $category = $filters['category'] ?? null;
        $exists = $filters['exists'] ?? 1;
        $hasDescount = $filters['hasDescount'] ?? 0;
        $fromPrice = $filters['fromPrice'] ?? 0;
        $toPrice = $filters['toPrice'] ?? null;
        $sortType = $filters['sortType'] ?? 'desc';
        $sortBy = $filters['sortBy'] ?? 'created_at';
        $keyword = $filters['keyword'] ?? null;
        $products = product::where(function ($query) use ($exists, $hasDescount, $fromPrice, $toPrice) {
            if ($fromPrice && !$toPrice) {
                $query->where('products.primary_price', '>=', $fromPrice);
            }
            if ($toPrice && !$fromPrice) {
                $query->where('products.primary_price', '<=', $toPrice);
            }
            if ($fromPrice && $toPrice) {
                $query->whereBetween('products.primary_price', [$fromPrice, $toPrice]);
            }
            if ($exists == 1) {
                $query->where('products.count', '!=', 0);
            }
            if ($hasDescount == 1) {
                $query->whereNotNull('products.secondary_price');
            }
        });
        if ($category && is_array($category) && count($category) > 0) {
            $products = $products->whereHas('categories', function ($q) use ($category) {
                $q->whereIn('categories.id', $category);
            });
        }
        if ($keyword) {
            $products = $products->where(function ($q) use ($keyword) {
                $q
                    ->where('products.title', 'like', '%' . $keyword . '%')
                    ->orWhere('products.summary', 'like', '%' . $keyword . '%')
                    ->orWhere('products.description', 'like', '%' . $keyword . '%');
            });
        }
        $products = $products->orderBy($sortBy, $sortType)->get();
        foreach ($products as $product) {
            if ($product->media->isNotEmpty()) {
                foreach ($product->media as $media) {
                    if ($media->is_main) {
                        $product->image  = $media->media_path;
                        break;
                    } else {
                        $product->image = 'default.jpg';
                    }
                }
            } else {
                $product->image = 'default.jpg';
            }

            if ($product->secondary_price) {
                $campare = $product->primary_price - $product->secondary_price;
                $x = $campare / $product->primary_price;
                $product->percent = intval($x * 100);
            }
        }
        return response()->json($products);
    }

    public function page(Request $request)
    {
        $title = $request->input('title');
        $products = product::with('media')->with('categories')->where('title', 'like', '%' . $title . '%')
            ->orWhere('summary', 'like', '%' . $title . '%')
            ->orWhere('description', 'like', '%' . $title . '%')
            ->orderBy('created_at', 'desc')->get();
        // $categories = category::all();
        $categories = category::with('products')->has('products')->get();
        foreach ($products as $product) {
            if ($product->media->isNotEmpty()) {
                foreach ($product->media as $media) {
                    if ($media->is_main) {
                        $product->image  = $media->media_path;
                        break;
                    } else {
                        $product->image = 'default.jpg';
                    }
                }
            } else {
                $product->image = 'default.jpg';
            }
            if ($product->secondary_price) {
                $campare = $product->primary_price - $product->secondary_price;
                $x = $campare / $product->primary_price;
                $product->percent = intval($x * 100);
            }
        }
        $logo = logo::first();
        return view('search', ['products' => $products, 'categories' => $categories, 'title' => $title, 'logo' => $logo]);
    }

    public function relatedProducts(category $category)
    {
        $title = $category->title;
        $products = $category->products;
        $categories = category::with('products')->has('products')->get();
        foreach ($products as $product) {
            if ($product->media->isNotEmpty()) {
                foreach ($product->media as $media) {
                    if ($media->is_main) {
                        $product->image  = $media->media_path;
                        break;
                    } else {
                        $product->image = 'default.jpg';
                    }
                }
            } else {
                $product->image = 'default.jpg';
            }
            if ($product->secondary_price) {
                $campare = $product->primary_price - $product->secondary_price;
                $x = $campare / $product->primary_price;
                $product->percent = intval($x * 100);
            }
        }
        $logo = logo::first();
        return view('search', ['products' => $products, 'categories' => $categories, 'title' => $title, 'logo' => $logo]);
    }
}
