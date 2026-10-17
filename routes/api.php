<?php

use App\Http\Controllers\CartsController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\WalletController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MessageController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/getFilters', [SearchController::class, 'getFilters']);
Route::post('/getDealFilter', [SearchController::class, 'getDealFilter']);
Route::post('/getTransactionFilter', [SearchController::class, 'getTransactionFilter']);

Route::post('/submitChanges', [WalletController::class, 'submitChanges']);
Route::post('/popupWalletData', [WalletController::class, 'popupWalletData']);
Route::post('/transactionRequestApi', [WalletController::class, 'transactionRequestApi']);

Route::get('/userDetail/{user}', [UserController::class, 'userDetail']);
Route::post('/updateUser', [UserController::class, 'update']);
Route::get('/deleteUser/{user}', [UserController::class, 'delete']);

Route::post('/cities', [CartsController::class, 'showCities']);
Route::post('/cart/store', [CartsController::class, 'store']);
Route::post('/cart/pack/store', [CartsController::class, 'packStore']);
Route::post('/cart/delete', [CartsController::class, 'delete']);
Route::post('/cart/pack/delete', [CartsController::class, 'packDelete']);
Route::post('/cart/update', [CartsController::class, 'update']);
Route::post('/cart/pack/update', [CartsController::class, 'packUpdate']);
Route::post('/cart/showCarts', [CartsController::class, 'showCarts']);
Route::post('/cart/saveOrder', [CartsController::class, 'saveOrder']);

Route::post('/order/store', [OrdersController::class, 'store']);
Route::post('/order/acceptOrder', [OrdersController::class, 'acceptOrder']);
Route::get('/order/cancelAll/{user}', [OrdersController::class, 'cancelAll']);
Route::get('/order/showItems/{order}', [OrdersController::class, 'showItems']);

Route::get('/findProduct/{product}', [ProductController::class, 'findProduct']);
Route::post('/cities', [CartsController::class, 'showCities']);
Route::post("messageStatus", [MessageController::class, "messageStatus"]);
