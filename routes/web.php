<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\TranslateController;

///////////////////////////////////////////////
use App\Http\Controllers\Store\CartController;
use App\Http\Controllers\Store\ProductController;
///////////////////////////////////////////////
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\WelcomeController;
///////////////////////////////////////////////
use App\Http\Controllers\Store\StoreController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\BtbController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Admin\User;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

require __DIR__.'/auth.php';
require __DIR__.'/maitenace.php';


Route::get('/translate', [TranslateController::class, 'translate'])->name('translate');
Route::get('/', [WelcomeController::class, 'welcome'])->name('welcome');

Route::get('/o-nas', function () {
    return view('aboutUs');
})->name('about-us');

Route::get('/wspolpraca', function () {
    return view('cooperation');
})->name('cooperation');

Route::get('/oferta', function () {
    return view('offer');
})->name('offer');


Route::get('/dropshipping', function () {
    return view('dropshipping');
})->name('dropshipping');

Route::get('/promocje', function () {
    return view('promotion');
})->name('promotions');

Route::get('/kontakt', function () {
    return view('contactUs');
})->name('contactUs');

Route::get('/category/{name}', [CategoryController::class, 'frontShow'])->name('frontShow');

Route::get('/product/{ean}', [ProductController::class, 'show'])->name('front.product.show');


Route::get('/stripe', [StripeController::class, 'index'])->name('stripe.index');
Route::post('/checkout', [StripeController::class, 'checkout'])->name('stripe.checkout');
Route::get('/success', [StripeController::class, 'success'])->name('stripe.success');



// ======================================================== //
// ==================== STORE ROUTES ====================== //
// ======================================================== //
Route::get('/orderMaker', function(){
    $carts = \App\Models\Admin\Cart::where('user_id', auth()->user()->id)->get();
    
    $user = User::where('id', auth()->user()->id)->with('address', 'company')->first();

    $phone = $user->company->phone;
    
    $adresy = $user->address()->get();
    return view('store.index', compact('carts', 'adresy', 'phone'));
})->middleware(['auth'])->name('store');



Route::get('/dashboard', [WelcomeController::class, 'welcome'])->middleware(['auth'])->name('dashboard');


Route::get('/btb-makeit', [BtbController::class, 'makeIt'])->name('btb.makeit'); // pobiera dane z pliku XML i komponuje je w tabeli b2b
Route::get('/btb', [BtbController::class, 'index'])->name('btb.index');
Route::get('/bd-integrate', [BtbController::class, 'bdIntegrate'])->name('btb.bdIntegrate');
Route::get('/btb-integrate', [BtbController::class, 'integrate'])->name('btb.integrate');
Route::get('/btb-assignCategories', [BtbController::class, 'assignCategories'])->name('btb.assignCategories');


Route::put('saveMe', 'App\Http\Controllers\Admin\ProductController@saveMe')->name('saveMe');

//Route::get('/admin', 'App\Http\Controllers\Admin\AdminController@index')->name('index');


Route::get('/caruzela', 'CarouselController@index')->name('store2');


// ======================================================== //
// ===================== USER ROUTES ====================== //
// ======================================================== //


Route::prefix('user')->middleware(['auth'])->group(function(){
    
    ////////////////////////////////////////////
   
            // User Settings
            Route::controller(UserController::class)->group(function(){
                Route::get('dashboard/', 'dashboard')->name('user.dashboard');
                Route::get('settings/profile', 'profileDetails')->name('user.profileDetails');
                Route::put('settings/profile', 'changeUserName')->name('user.changeUserName');
                Route::get('settings/account', 'accountSettings')->name('user.accountSettings');
                Route::get('settings/company', 'companySettings')->name('user.companySettings');
                Route::put('settings/company/update', 'companyUpdate')->name('user.companyUpdate');
                Route::get('settings/deliveryAddress', 'deliveryAddress')->name('user.deliveryAddress');
                Route::delete('settings/account/deleteAddress', 'deleteAddress')->name('user.deleteAddress');
                                
                Route::put('settings/account/changeEmail', 'changeEmail')->name('user.changeEmail');
                Route::put('settings/account/changePhone', 'changePhone')->name('user.changePhone');
                Route::put('settings/account/changeUserDetails', 'changeUserDetails')->name('user.changeUserDetails');
                Route::match(['put','post'], 'settings/account/changeUserAddress', 'changeUserAddress')->name('user.changeUserAddress');
                Route::post('settings/account/addNewAddress', 'addNewAddress')->name('user.addNewAddress');
                Route::put('settings/account/updateAddress/{id}', 'updateAddress')->name('user.updateAddress');
            });

            // User Orders
            Route::controller(\App\Http\Controllers\Store\OrderController::class)->group(function(){
                Route::get('orders', 'index')->name('user.orders.index');
                Route::get('order/makeit', 'create')->name('order.create');
                Route::get('order/{ref_number}', 'show')->name('order.show');
                Route::post('/orderToPDF', 'generateOrderToPDF')->name('generateOrderToPDF');

            });
        
});