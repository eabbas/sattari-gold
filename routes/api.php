<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WalletController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/getFilters', [SearchController::class, 'getFilters']);
Route::post('/getDealFilter', [SearchController::class, 'getDealFilter']);
Route::post('/getTransactionFilter', [SearchController::class, 'getTransactionFilter']);

Route::post('/submitChanges', [WalletController::class, 'submitChanges']);
 Route::post('/popupWalletData', [WalletController::class, 'popupWalletData']);

Route::get('/userDetail/{user}', [UserController::class, 'userDetail']);
Route::post('/updateUser', [UserController::class, 'update']);
Route::get('/deleteUser/{user}', [UserController::class, 'delete']);