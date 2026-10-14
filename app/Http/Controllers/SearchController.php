<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\deal;
use App\Models\logo;
use App\Models\product;
use App\Models\transaction;
use Illuminate\Http\Request;
use Log;

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
                        $product->image = $media->media_path;
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
        $products = product::with('media')
            ->with('categories')
            ->where('title', 'like', '%' . $title . '%')
            ->orWhere('summary', 'like', '%' . $title . '%')
            ->orWhere('description', 'like', '%' . $title . '%')
            ->orderBy('created_at', 'desc')
            ->get();
        // $categories = category::all();
        $categories = category::with('products')->has('products')->get();
        foreach ($products as $product) {
            if ($product->media->isNotEmpty()) {
                foreach ($product->media as $media) {
                    if ($media->is_main) {
                        $product->image = $media->media_path;
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
                        $product->image = $media->media_path;
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

    public function getDealFilter(Request $request)
    {
        // return response()->json($request->all());
        $filters = $request->input('filters');
        $fromDate = $filters['fromDate'] ?? null;
        $toDate = $filters['toDate'] ?? null;
        $number = $filters['dealId'] ?? null;
        $dealType = $filters['dealType'] ?? ['all'];
        $dealState = $filters['dealState'] ?? ['all'];
        $fullName = $filters['fullName'] ?? null;
        $price = $filters['price'] ?? null;
        $weight = $filters['weight'] ?? null;
        if ($number) {
            $dealId = substr($number, 3);
            $deals = deal::find($dealId);
            return response()->json([$deals]);
        }

        if ($dealType == ['all']) {
            $dealType = [];
            $dealType[] = 'sell';
            $dealType[] = 'buy';
        }
        if ($dealState == ['all']) {
            $dealState = [];
            $dealState[] = '-1';
            $dealState[] = '0';
            $dealState[] = '1';
            }
            
        $deals = deal::where(function ($query) use ($price, $weight, $fromDate, $toDate, $dealState) {
            if ($price) {
                $query->where('deals.buyPrice', $price);
            }
            if ($weight) {
                $query->where('deals.goldWeight', $weight);
            }
            if ($fromDate && !$toDate) {
                $query->where('deals.date', '>=', $fromDate);
            }
            if ($toDate && !$fromDate) {
                $query->where('deals.date', '<=', $toDate);
            }
            if ($fromDate && $toDate) {
                $query->whereBetween('deals.date', [$fromDate, $toDate]);
            }
            if ($dealState) {
                $query->whereIn('deals.isApproved', $dealState);
            }
        })->whereHas('transaction', function ($query) use ($dealType) {
            $query->whereIn('transactions.type', $dealType);
        })->with(['transaction', 'user']);

        if ($fullName) {
            $deals->with(['user' => function ($query) use ($fullName) {
                $query->where('name', 'like', '%' . $fullName . '%')->orWhere('family', 'like', '%' . $fullName . '%');
            }]);
        }
        $deals = $deals->orderBy('date', 'desc')->orderBy('time', 'desc')->get();
        foreach ($deals as $deal) {
            switch ($deal->transaction->isApproved) {
                case -1:
                    $deal->state = 'رد شده';
                    $deal->color = '#E85D5D';
                    break;
                case 0:
                    $deal->state = 'در انتظار';
                    $deal->color = '#F5A623';
                    break;
                case 1:
                    $deal->state = 'تایید شده';
                    $deal->color = '#18A878';
                    break;
            }
        }
        return response()->json($deals);
    }
    public function getTransactionFilter(Request $request)
    {

        $filters = $request->input('filters');
        $fromDate = $filters['fromDate'] ?? null;
        $fullName = $filters['fullName'] ?? null;
        $status = $filters['status'] ?? ['all'];
        $type = $filters['type'] ?? ['all'];
        $toDate = $filters['toDate'] ?? null;
        $price = $filters['price'] ?? null;
        $number = $filters['transactionId'] ?? null;
        if ($number) {
            $transactionId = substr($number, 3);
            $transactions = transaction::find($transactionId);
            return response()->json($transactions);
        }
        if ($type == ['all']) {
            $type = [];
            $type[] = 'sell';
            $type[] = 'buy';
            $type[] = 'deposit';
            $type[] = 'withdraw';
        }
        if ($status == ['all']) {
            $status = [];
            $status[] = '-1';
            $status[] = '0';
            $status[] = '1';
        }
        $transactions = transaction::where(function ($query) use ($price, $fromDate, $toDate, $type, $status) {
            if ($price) {
                $query->where('transactions.amount', $price);
            }
            if ($fromDate && !$toDate) {
                $query->where('transactions.date', '>=', $fromDate);
            }
            if ($toDate && !$fromDate) {
                $query->where('transactions.date', '<=', $toDate);
            }
            if ($fromDate && $toDate) {
                $query->whereBetween('transactions.date', [$fromDate, $toDate]);
            }
            if ($status) {
                $query->whereIn('transactions.isApproved', $status);
            }
            if ($type) {
                $query->whereIn('transactions.type', $type);
            }
        })->with(['wallet', 'deal']);

        if ($fullName) {
            $transactions->whereHas('wallet', function ($query) use ($fullName) {
                $query->whereHas('user', function ($query) use ($fullName) {
                    $query->where('name', 'like', '%' . $fullName . '%')->orWhere('family', 'like', '%' . $fullName . '%');
                });
            });
        }
        $transactions = $transactions->orderBy('created_at', 'desc')->get();
        foreach ($transactions as $transaction) {
            $transaction->fullName = $transaction->wallet->user->name . ' ' . $transaction->wallet->user->family;
            $transaction->phoneNumber = $transaction->wallet->user->phoneNumber;
            switch ($transaction->type) {
                case 'deposit':
                    $transaction->type = 'واریز';
                    $transaction->typeColor = '#3aae3f';
                    break;
                case 'withdraw':
                    $transaction->type = 'برداشت';
                    $transaction->typeColor = '#d23334';
                    break;
                case 'buy':
                    $transaction->type = 'خرید';
                    $transaction->typeColor = '#0867d5';
                    break;
                case 'sell':
                    $transaction->type = 'فروش';
                    $transaction->typeColor = '#e57200';
                    break;
            }
            switch ($transaction->isApproved) {
                case -1:
                    $transaction->stateTitle = 'رد شده';
                    $transaction->stateColor = '#d23334';
                    break;
                case 0:
                    $transaction->stateTitle = 'در انتظار';
                    $transaction->stateColor = '#6a6a6a';
                    break;
                case 1:
                    $transaction->stateTitle = 'تایید شده';
                    $transaction->stateColor = '#3aae3f';
                    break;
            }
        }
        return response()->json($transactions);
    }
}
