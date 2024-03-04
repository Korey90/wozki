<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

use App\Http\Controllers\Store\CartController;

Route::post('/search_product', [CartController::class, 'searchProduct']);// wyszukuje i wyswietla dane
Route::post('/add_to_favorites', [CartController::class, 'addToFavorites']);
Route::post('/save_note', [CartController::class, 'saveNote']);
Route::post('/add_to_cart', [CartController::class, 'addToCart']);
Route::post('/load_cart', [CartController::class, 'loadCart']); // laduje i wyswiatla produkty
Route::post('/submit_order', [CartController::class, 'submitOrder']);
Route::post('/remove_from_cart', [CartController::class, 'removeFromCart']);
Route::post('/change_quantity', [CartController::class, 'changeQuantity']);