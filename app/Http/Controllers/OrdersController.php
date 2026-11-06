<?php

namespace App\Http\Controllers;

use App\Models\address;
use App\Models\carts;
use App\Models\category;
use App\Models\logo;
use App\Models\order_status;
use App\Models\orders;
use App\Models\product;
use App\Models\User;
use App\Models\user_role;
use Hekmatinasser\Verta\Verta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Log;

class OrdersController extends Controller
{
    public function store(Request $request)
    {
        $receipt = $request->file('receipt')->getClientOriginalName();
        $path = $request->file('receipt')->storeAs('receipts', $receipt, 'public');
        $name = $request->input('name');
        $family = $request->input('family');
        $cityId = $request->input('cityId');
        $addressText = $request->input('address');
        $postalCode = $request->input('postalCode');
        $phoneNumber = $request->input('phoneNumber');
        $nationalCode = $request->input('nationalCode');
        $descriptoin = $request->input('descriptoin');
        $password = $request->input('password');
        $password = isset($password) ? Hash::make($password) : false;
        $products = json_decode($request->products);
        if ($password) {
            User::upsert([
                'name' => $name,
                'family' => $family,
                'phoneNumber' => $phoneNumber,
                'nationalCode' => $nationalCode,
                'password' => $password,
            ], ['phoneNumber'], ['name', 'family', 'nationalCode', 'password']);
        } else {
            User::upsert([
                'name' => $name,
                'family' => $family,
                'phoneNumber' => $phoneNumber,
                'nationalCode' => $nationalCode,
            ], ['phoneNumber'], ['name', 'family', 'nationalCode', 'password']);
        }

        $user = User::where('phoneNumber', $phoneNumber)->first();

        if (count($user->roles) > 0) {
            $userRoleIds = $user->roles->pluck('id')->toArray();
            if (!in_array(1, $userRoleIds)) {
                user_role::create(['role_id' => 2, 'user_id' => $user->id]);
            }
        }

        $address = address::firstOrCreate([
            'user_id' => $user->id,
            'address' => $addressText,
            'city_id' => $cityId,
            'postalCode' => $postalCode
        ]);

        $dateTime = explode(' ', verta());
        $date = implode('/', explode('-', $dateTime[0]));
        $currentTime = explode(':', $dateTime[1]);
        unset($currentTime[count($currentTime) - 1]);
        $time = implode(':', $currentTime);

        $order = orders::create([
            'user_id' => $user->id,
            'description' => $descriptoin,
            'receipt' => $path,
            'onlinePayment' => 0,
            'address_id' => $address->id,
            'order_status_id' => 1,
            'date' => $date,
            'time' => $time,
        ]);

        $order_code = '100' . $order->id;
        orders::where('id', $order->id)->update(['order_code' => $order_code]);

        if ($products) {
            foreach ($products as $product) {
                carts::create([
                    'product_id' => $product->id,
                    'user_id' => $user->id,
                    'order_id' => $order->id,
                    'quantity' => $product->quantity
                ]);
                $finalQuantity = $product->count - $product->quantity;
                product::where('id', $product->id)->update(['count' => $finalQuantity]);
            }
        }
       

        return redirect('/')->with('clearStorage', true);
    }

    public function index()
    {
        $orders = orders::orderBy('date', 'desc')->orderBy('time', 'desc')->get();
        $categories = category::with('products')->has('products')->get();
        $products = product::where('show_in_home', 1)->get();

        foreach ($products as $product) {
            if ($product->media->isNotEmpty()) {
                foreach ($product->media as $media) {
                    if ($media['is_main']) {
                        $product['mainImg'] = $media['media_path'];
                        break;
                    } else {
                        $product['mainImg'] = 'default.jpg';
                    }
                }
            } else {
                $product['mainImg'] = 'default.jpg';
            }
        }
        $logo = logo::first();
        return view('admin.order.index', [
            'categories' => $categories,
            'products' => $products,
            'orders' => $orders,
            'logo' => $logo,
        ]);
    }

    public function showItems(orders $order)
    {
        $order->load(['carts' => function ($query) {
            $query->with(['product' => function ($q) {
                $q->with(['media' => function ($qr) {
                    $qr->where('is_main', 1)->get();
                }]);
            }]);
        }]);
        $order->state;
        return response()->json($order);
    }

    public function cancelAll(User $user)
    {
        carts::where('user_id', $user->id)->whereNull('order_id')->delete();
        return response()->json('ok');
    }

    public function acceptOrder(Request $request)
    {
        $order = orders::with(['state', 'carts.product'])->find($request->order_id);

        // if (!$order) {
        //     return response()->json(['error' => 'سفارش یافت نشد'], 404);
        // }

        // return response()->json($order);

        if ($request->status == 1) {
            $order->order_status_id = 2;
        }
        if ($request->status == 2) {
            $order->order_status_id = 3;
        }
        if ($request->status == 3) {
            $order->order_status_id = 4;
        }
        // if ($request->status == 4) {
        //     $order->order_status_id = 5;
        // }
        // if ($request->status == 5) {
        //     $order->order_status_id = 6;
        // }

        $order->save();

        // Log::info($order);

        $order->load('state');

        // return response()->json([$order, $request->all()]);
        return response()->json($order);
    }

    public function userOrders()
    {
        $orders = Auth::user()->orders()->orderBy('date', 'desc')->orderBy('time', 'desc')->get();
        $categories = category::with('products')->has('products')->get();
        $products = product::where('show_in_home', 1)->get();

        foreach ($products as $product) {
            if ($product->media->isNotEmpty()) {
                foreach ($product->media as $media) {
                    if ($media['is_main']) {
                        $product['mainImg'] = $media['media_path'];
                        break;
                    } else {
                        $product['mainImg'] = 'default.jpg';
                    }
                }
            } else {
                $product['mainImg'] = 'default.jpg';
            }
        }
        $logo = logo::first();
        return view('admin.order.userOrders', [
            'categories' => $categories,
            'products' => $products,
            'orders' => $orders,
            'logo' => $logo,
        ]);
    }
}
