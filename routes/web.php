<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CreditCardController;
use App\Http\Controllers\DealController;
use App\Http\Controllers\HeaderController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LogoController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WalletController;
use App\Http\Middleware\checkAccess;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\CartsController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ReferenceSitesController;
use App\Http\Controllers\TransactionSettingController;
use App\Http\Middleware\checkIsActive;
use App\Http\Middleware\checklogin;
use Illuminate\Support\Facades\Route;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\logo;
use App\Models\creditCard;
use App\Models\transactionSetting;
use Illuminate\Support\Facades\Auth;

Route::get('/z', function () {
    $logo = logo::first();
    return view('user.user.account', ['logo' => $logo]);
});

Route::get('/p', function () {
    $logo = logo::first();
    return view('admin.product.managing_product', ['logo' => $logo]);
});

Route::get('/u', function () {
    $logo = logo::first();
    return view('admin.user.category_user', ['logo' => $logo]);
});

Route::get('/xyz', function () {
    // $dateTime = explode(' ', now());
    // $dateJalali = verta($dateTime[0]);
    // $date = explode(' ', $dateJalali);
    // $date = implode('/', explode('-', $date[0]));
    // $time = $dateTime[1];
    // dd($dateTime, $dateJalali, $date, $time);
    // --------------------------------------------------------------------
    // Schema::table('transactions', function (Blueprint $table) {
    //     $table->string('description')->nullable()->after('receipt');
    //     $table->string('date')->nullable()->after('description');
    //     $table->string('time')->nullable()->after('date');
    // });
    // Schema::table('users', function (Blueprint $table) {
    //     $table->string('password')->nullable()->change();
    // });
    // Schema::table('orders', function (Blueprint $table) {
    //     $table->string('receipt')->nullable()->after('description');
    // });
});

// home routes
Route::get('/', [HomeController::class, 'index'])->name('home');

// user routes
Route::group([
    'prefix' => 'user',
    'controller' => UserController::class,
    'as' => 'user.',
], function () {
    Route::get('/login', 'login')->name('login');
    Route::get('/loginWithCode', 'loginWithCode')->name('loginWithCode');
    Route::post('/checkUser', 'checkUser')->name('checkUser');
    Route::post('/checkUserPopup', 'checkUserPopup')->name('checkUserPopup');
    Route::post('/validate', 'validate')->name('validate');
    Route::post('/search', 'search')->name('search');
    Route::get('/forgetPassword', 'forgetPassword')->name('forgetPassword');
    Route::post('/sendCode', 'send_sms')->name('sendCode');
    Route::post('/sendSMS', 'send_code')->name('sendSMS');
    Route::post('/setPassword', 'setPassword')->name('setPassword');
    Route::post('/savePassword', 'savePassword')->name('savePassword');
    Route::get('/signup', 'signup')->name('signup');
    Route::post('/store', 'store')->name('store');
    Route::post('/adminStore', 'adminStore')->name('adminStore');
    Route::get('/logout', 'logout')->name('logout');
    Route::get('/index', 'index')->middleware(checkAccess::class . ":user_idex")->name('index');
    Route::post('/edit', 'edit')->name('edit');
    Route::post('/profileEdit', 'profileEdit')->name('profileEdit');
    Route::post('/update', 'update')->name('update');
    Route::post('/updateProfile', 'updateProfile')->name('updateProfile');
    Route::post('/removeActivationCode', 'removeActivationCode')->name('removeActivationCode');
    Route::post('/checkAuth', 'checkAuth')->name('checkAuth');
    Route::get('/profile/{user?}', 'profile')->middleware(checklogin::class)->missing(function () {
        return to_route('missing');
    })->name('profile');
});

// header routes
Route::group([
    'prefix' => 'header',
    'controller' => HeaderController::class,
    'as' => 'header.',
    'middleware' => checkAccess::class . ":header"
], function () {
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
});

// logo routes
Route::group([
    'prefix' => 'logo',
    'controller' => LogoController::class,
    'as' => 'logo.',
    'middleware' => checkAccess::class . ":logo"
], function () {
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
});

// menu menu
Route::group([
    'prefix' => 'menu',
    'controller' => MenuController::class,
    'as' => 'menu.',
    'middleware' => checkAccess::class . ":menu"
], function () {
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/delete/{id}', 'delete')->name('delete');
    Route::post('/deleteAll', 'deleteAll')->name('deleteAll');
    Route::post('/edit', 'edit')->name('edit');
    Route::post('/update', 'update')->name('update');
    Route::post('/show', 'show')->name('show');
});

// category routes
Route::group([
    'prefix' => 'category',
    'controller' => CategoryController::class,
    'as' => 'category.',
    // 'middleware' => checkAccess::class . ":category"
], function () {
    Route::get('/create', 'create')->middleware(checkAccess::class . ":category_create")->name('create');
    Route::post('/store', 'store')->middleware(checkAccess::class . ":category_create")->name('store');
    Route::get('/admin/list', 'adminIndex')->middleware(checkAccess::class . ":category_show")->name('adminIndex');
    Route::post('/admin/show', 'adminShow')->middleware(checkAccess::class . ":category_show")->name('adminShow');
    Route::post('/edit/', 'edit')->middleware(checkAccess::class . ":category_edit")->name('edit');
    Route::post('/update', 'update')->middleware(checkAccess::class . ":category_edit")->name('update');
    Route::get('/delete/{id}', 'delete')->middleware(checkAccess::class . ":category_delete")->name('delete');
    Route::post('/admin/deleteAll', 'deleteAll')->middleware(checkAccess::class . ":category_delete")->name('deleteAll');
    Route::get('/list', 'index')->withoutMiddleware(checkAccess::class)->name('index');
    Route::get('/show/{category}', 'show')->withoutMiddleware(checkAccess::class)->missing(function () {
        return to_route('missing');
    })->name('show');
    Route::post('/showSubCategories', 'showSubCats')->withoutMiddleware(checkAccess::class)->name('showSubCats');
});

// product routes
Route::group([
    'prefix' => 'product',
    'controller' => ProductController::class,
    'as' => 'product.',
    // 'middleware' => checkAccess::class
], function () {
    Route::get('/create', 'create')->middleware(checkAccess::class . ":product_create")->name('create');
    Route::post('/store', 'store')->middleware(checkAccess::class . ":product_create")->name('store');
    Route::get('/admin/list', 'adminIndex')->middleware(checkAccess::class . ":product_show")->name('adminIndex');
    Route::post('/edit/', 'edit')->middleware(checkAccess::class . ":product_edit")->name('edit');
    Route::post('/update', 'update')->middleware(checkAccess::class . ":product_edit")->name('update');
    Route::get('/delete/{id}', 'delete')->middleware(checkAccess::class . ":product_delete")->name('delete');
    Route::post('/admin/deleteAll', 'deleteAll')->middleware(checkAccess::class . ":product_delete")->name('deleteAll');
    Route::get('/show/{product}', 'show')->withoutMiddleware(checkAccess::class)->missing(function () {
        return to_route('missing');
    })->name('show');
    Route::get('/list', 'index')->withoutMiddleware(checkAccess::class)->name('index');
    Route::post('/filterRelatedProducts', 'filter')->withoutMiddleware(checkAccess::class)->name('filter');
    Route::post('/search', 'search')->withoutMiddleware(checkAccess::class)->name('search');
    Route::post('/searchResult', 'searchResult')->withoutMiddleware(checkAccess::class)->name('searchResult');
});

// wallet routes
Route::group([
    'prefix' => 'wallet',
    'controller' => WalletController::class,
    'as' => 'wallet.',
], function () {
    Route::get('/user/{user?}', 'wallet')->missing(function () {
        return to_route('missing');
    })->middleware(checklogin::class)->name('wallet');
    Route::post('/transaction/request', 'transactionRequest')->middleware(checkIsActive::class)->name('transactionRequest');
    Route::post('/transactions', 'transactions')->name('transactions');
    Route::get('/transactions/list', 'transactionsList')->middleware(checkAccess::class . ":transactionsList")->name('transactionsList');
    Route::get('/transactions/user/{user}', 'transactionsListSingle')->missing(function () {
        return to_route('missing');
    })->middleware(checkAccess::class)->name('transactionsListSingle');
    Route::post('/submitChanges', 'submitChanges')->middleware(checkAccess::class)->name('submitChanges');
    Route::post('/popupWalletData', 'popupWalletData')->name('popupWalletData');
});

// search routes
Route::group([
    'prefix' => 'search',
    'controller' => SearchController::class,
    'as' => 'search.'
], function () {
    Route::post('/', 'page')->name('page');
    Route::get('/relatedProducts/{category}', 'relatedProducts')->missing(function () {
        return to_route('missing');
    })->name('relatedProducts');
});

// deal routes
Route::group([
    'prefix' => 'deal',
    'controller' => DealController::class,
    'middleware' => [checklogin::class],
    'as' => 'deal.'
], function () {
    Route::get('/create', 'create')->name('create');
    Route::get('/confirm/{deal}', 'confirm')->name('confirm');
    Route::post('/store', 'store')->middleware(checkIsActive::class)->name('store');
    Route::post('/storeTemporary', 'storeTemporary')->middleware(checkIsActive::class)->name('storeTemporary');
    Route::get('/list', 'list')->name('list');
    Route::get('/adminIndex', 'adminIndex')->middleware(checkAccess::class . ":deal_index")->name('adminIndex');
});

// creditCard routes
Route::group([
    'prefix' => 'creditCard',
    'controller' => CreditCardController::class,
    'middleware' => checklogin::class,
    'as' => 'creditCard.'
], function () {
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
});

// reference sites routes
Route::group([
    'prefix' => 'referenceSite',
    'controller' => ReferenceSitesController::class,
    // 'middleware' => checkAccess::class,
    'as' => 'referenceSite.'
], function () {
    Route::get('/create', 'create')->middleware(checkAccess::class . ":referenceSite_create")->name('create');
    Route::post('/store', 'store')->middleware(checkAccess::class . ":referenceSite_create")->name('store');
    Route::post('/update', 'update')->middleware(checkAccess::class . ":referenceSite_edit")->name('update');
    Route::get('/delete/{site}', 'delete')->middleware(checkAccess::class . ":referenceSite_delete")->name('delete');
});

// transaction setting routes
Route::group([
    'prefix' => 'transactionSetting',
    'controller' => TransactionSettingController::class,
    'middleware' => checkAccess::class . ":transactionSetting",
    'as' => 'transactionSetting.'
], function () {
    Route::get('/create', 'create')->name('create');
    Route::post('/updateOrCreate', 'updateOrCreate')->name('updateOrCreate');
});

// role permission routes
Route::group([
    'prefix' => 'role',
    'controller' => PermissionController::class,
    // 'middleware' => checkAccess::class,
    'as' => 'role.'
], function () {
    Route::get('/create', 'create')->middleware(checkAccess::class . ":role_create")->name('create');
    Route::post('/store', 'roleStore')->middleware(checkAccess::class . ":role_create")->name('roleStore');
    Route::get('/delete/{role}', 'roleDelete')->middleware(checkAccess::class . ":role_delete")->name('roleDelete');
    Route::post('/setPermissions', 'setPermissions')->middleware(checkAccess::class . ":setPermissions")->name('setPermissions');
});

// order routes
Route::group([
    'prefix' => 'order',
    'controller' => OrdersController::class,
    'middleware' => checklogin::class,
    'as' => 'order.'
], function () {
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store')->withoutMiddleware([checklogin::class]);
    Route::get('/index', 'index')->middleware(checkAccess::class . ":order_show")->name('index');
    Route::get('/userOrders', 'userOrders')->name('userOrders');
});

// cart routes
Route::group([
    'prefix' => 'cart',
    'controller' => CartsController::class,
    'as' => 'cart.'
], function () {
    Route::get('/', 'list')->name('list');
    Route::get('/checkout', 'checkout')->name('checkout');
});

// message routes
Route::group([
    "as" => "Message.",
    "prefix" => "Message",
    "controller" => MessageController::class
], function () {
    Route::get("insert", 'insert')->middleware(checkAccess::class . ":message_create")->name('insert');
    Route::post("/create", "create")->middleware(checkAccess::class . ":message_create")->name("create");
    Route::get("list", "list")->name("list");
    Route::get("delete/{id}", "delete")->name("delete");
    Route::get("update/{id}", "update")->name("update");
    Route::post("edit", "edit")->name("edit");
    Route::post("messageStatus",  "messageStatus")->name("messageStatus");
});

// fallback and missing
Route::fallback([HomeController::class, 'pageNotFound'])->name('fallback');
Route::get('/missing', [HomeController::class, 'pageNotFound'])->name('missing');
