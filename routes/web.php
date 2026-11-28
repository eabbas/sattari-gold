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
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\CartsController;
use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\DefaultCommentsController;
use App\Http\Controllers\LivePriceController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PriceLineController;
use App\Http\Controllers\ReferenceSitesController;
use App\Http\Controllers\TransactionConfirmTimeController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\TransactionSettingController;
use App\Http\Controllers\AboutUscontroller;
use App\Http\Middleware\checkAccess;
use App\Http\Middleware\checkIsActive;
use App\Http\Middleware\checkIsApproved;
use App\Http\Middleware\checklogin;
use Illuminate\Support\Facades\Route;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

Route::get('/xyz', function () {
    // Schema::table('deals', function (Blueprint $table) {
    //     $table->string('message')->nullable()->after('isApproved');
    // });
    // Schema::table('headers', function (Blueprint $table) {
    //     $table->string('header_bg')->nullable()->change();
    //     $table->string('header_img')->nullable()->change();
    // });
    // Schema::table('logos', function (Blueprint $table) {
    //     $table->string('logo')->nullable()->change();
    // });

    Schema::table('about_us', function (Blueprint $table) {
        $table->longText("ourStory")->nullable()->change();
        $table->longText("description")->nullable()->change();
    });
    // Schema::table('users', function (Blueprint $table) {
    //     $table->string("password")->nullable()->change();
    // });

});

// home routes
Route::group([
    'controller' => HomeController::class,
], function () {
    Route::get('/', 'index')->name('home');
    Route::get('/contact-us', 'contactUs')->name('contactUs');
});

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
    Route::post('/validateNewPass', 'validateNewPass')->name('validateNewPass');
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
    Route::get('/index', 'index')->middleware(checkAccess::class . ":user_index")->name('index');
    Route::post('/pendingUsers', 'pendingUsers')->middleware(checkAccess::class . ":user_index")->name('pendingUsers');
    Route::post('/profileEdit', 'profileEdit')->name('profileEdit');
    Route::post('/update', 'update')->name('update');
    Route::post('/updateProfile', 'updateProfile')->name('updateProfile');
    Route::post('/removeActivationCode', 'removeActivationCode')->name('removeActivationCode');
    Route::post('/checkAuth', 'checkAuth')->name('checkAuth');
    Route::get('/profile/{user?}', 'profile')->middleware(checkIsApproved::class)->missing(function () {
        return to_route('missing');
    })->name('profile');
    Route::get('/notApproved', 'notApproved')->middleware(checklogin::class)->name('notApproved');
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

// menu routes
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

// default comments routes
Route::group([
    'prefix' => 'defaultComments',
    'controller' => DefaultCommentsController::class,
    'as' => 'comment.',
    'middleware' => checkAccess::class . ":comment"
], function () {
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
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
    'controller' => WalletController::class,
    'as' => 'wallet.',
], function () {
    Route::get('/wallet/user/{user?}', 'wallet')->missing(function () {
        return to_route('missing');
    })->middleware(checkIsApproved::class)->name('wallet');
    Route::post('/transaction/request', 'transactionRequest')->middleware(checkIsActive::class)->name('transactionRequest');
    Route::get('/transactions/list', 'transactionsList')->middleware(checkAccess::class . ":transactionsList")->name('transactionsList');
    Route::get('/transactions/user/{user}', 'userTransactions')->middleware(checkIsApproved::class)->name('userTransactions');
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
    'as' => 'deal.'
], function () {
    Route::get('/create/{user?}', 'create')->middleware(checkIsApproved::class)->name('create');
    Route::get('/confirm/{deal}', 'confirm')->middleware(checkAccess::class . ":deal_confirm")->name('confirm');
    Route::post('/cancel', 'cancel')->middleware(checkAccess::class . ":deal_confirm")->name('cancel');
    Route::post('/store', 'store')->middleware(checkIsActive::class)->name('store');
    Route::post('/storeTemporary', 'storeTemporary')->middleware(checkIsActive::class)->name('storeTemporary');
    Route::get('/list/{user?}', 'list')->middleware(checkIsApproved::class)->name('list');
    Route::get('/adminIndex', 'adminIndex')->middleware(checkAccess::class . ":deal_index")->name('adminIndex');
});

// creditCard routes
Route::group([
    'prefix' => 'creditCard',
    'controller' => CreditCardController::class,
    'middleware' => checkIsApproved::class,
    'as' => 'creditCard.'
], function () {
    Route::get('/create/{user?}', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::post('/edit', 'edit')->name('edit');
    Route::post('/update', 'update')->name('update');
    Route::get('/delete/{creditCard}', 'delete')->name('delete');
    Route::get('/list', 'index')->middleware(checkAccess::class . ":all_creditCards")->name('index');
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
    Route::post('/permissionsOfRole', 'permissionsOfRole')->name('permissionsOfRole');
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
    Route::get('/userOrders', 'userOrders')->middleware(checkIsApproved::class)->name('userOrders');
});

// cart routes
Route::group([
    'prefix' => 'cart',
    'controller' => CartsController::class,
    'as' => 'cart.'
], function () {
    Route::get('/', 'list')->name('list');
    Route::get('/checkout', 'checkout')->name('checkout')->middleware([checklogin::class]);
});

// message routes
Route::group([
    "as" => "message.",
    "prefix" => "message",
    "controller" => MessageController::class,
], function () {
    Route::get("create", 'create')->middleware(checkAccess::class . ":message_create")->name('create');
    Route::post("/store", "store")->middleware(checkAccess::class . ":message_create")->name("store");
    Route::get("delete/{id}", "delete")->middleware(checkAccess::class . ":message_delete")->name("delete");
    Route::post("/update", "update")->middleware(checkAccess::class . ":message_edit")->name("update");
    Route::post("edit", "edit")->middleware(checkAccess::class . ":message_edit")->name("edit");
});

// prices routes
Route::group([
    'as' => 'price.',
    'prefix' => 'price',
    'controller' => LivePriceController::class,
    'middleware' => checkAccess::class . ":livePrice"
], function () {
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
});

// price line routes
Route::group([
    'as' => 'line.',
    'prefix' => 'line',
    'controller' => PriceLineController::class,
    'middleware' => checkAccess::class . ":priceLine"
], function () {
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
});

// currency unit routes
Route::group([
    'as' => 'currencyUnit.',
    'prefix' => 'currencyUnit',
    'controller' => CurrencyController::class,
    'middleware' => checkAccess::class . ":currency"
], function () {
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
});

// transaction confirm time routes
Route::group([
    'as' => 'transactionConfirmTime.',
    'prefix' => 'transactionConfirmTime',
    'controller' => TransactionConfirmTimeController::class,
    'middleware' => checkAccess::class . ":transactionConfirmTime"
], function () {
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
});

// contact us routes
Route::group([
    'as' => 'contactUs.',
    'prefix' => 'contactUs',
    'controller' => ContactUsController::class,
    // 'middleware' => checkAccess::class
], function () {
    Route::post('/store', 'store')->name('store');
    Route::get('/list', 'list')->name('list');
});

// about us routes
Route::group([
    'prefix' => 'aboutUs',
    'as' => 'aboutUs.',
    'controller' => AboutUscontroller::class,
    // 'middleware' => checkAccess::class . ":transactionConfirmTime"
], function () {
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/edit/{id}', 'edit')->name('edit');
    Route::post('/delete', 'delete')->name('delete');
    Route::get('/', 'aboutUs')->name('aboutUs');
});

// fallback and missing
Route::fallback([HomeController::class, 'pageNotFound'])->name('fallback');
Route::get('/missing', [HomeController::class, 'pageNotFound'])->name('missing');
