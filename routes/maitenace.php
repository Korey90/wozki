<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\AdminController;

use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SupplierController;
use App\Http\Controllers\Admin\PromotionController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CarouselController;
use App\Http\Controllers\Admin\PurchaseController;
use App\Http\Controllers\Admin\StockController;
use App\Http\Controllers\Admin\InvoiceController;
use App\Http\Controllers\Admin\ArtisanController;
use App\Http\Controllers\BtbController;

Route::prefix('maitenace')->group(function(){

    Route::controller(BtbController::class)->group(function(){
        Route::get('/b2b-dashboard', 'dashboard')->name('btb.dashboard');
    });

    
    Route::controller(AdminController::class)->group(function(){
        Route::get('/', 'dashboard');
        // Admin loginn route without admin group
        Route::match(['get','post'], 'login', 'login');
        // Admin Dashord Routes without admin group
        Route::get('/dashboard', 'dashboard')->name('admin.dashboard');
        Route::get('/inne', 'inne')->name('admin.inne');    
        Route::get('/inne/filter', 'filter')->name('admin.inne.filter');    
        Route::post('/inne', 'addNewTransaction')->name('admin.inne.addNewTransaction');
    });

    // Artisan Controller
    Route::controller(ArtisanController::class)->group(function(){
        Route::get('artisan/index', 'index')->name('artisan.index');
        Route::post('artisan/createModel', 'createModel')->name('artisan.createModel');
        Route::post('/artisan/edit-routes/{typ}', 'updateRoutes')->name('artisan.updateRoutes');
        Route::post('/artisan/createController', 'storeController')->name('artisan.storeController');


    });


    // Admin Suppliers
    Route::controller(SupplierController::class)->group(function(){
        Route::get('suppliers', 'index')->name('supplier.index');
        Route::get('supplier/{id}', 'show')->name('supplier.show');
        Route::get('supplier/', 'create')->name('supplier.create');
        Route::post('supplier/', 'store')->name('supplier.store');
        Route::get('supplier/{id}/edit', 'edit')->name('supplier.edit');
        Route::put('supplier/update', 'update')->name('supplier.update');
    });

    // Admin Products
    Route::controller(ProductController::class)->group(function(){
        Route::get('products', 'index')->name('product.index');
        Route::get('product/{id}', 'show')->name('product.show');
        Route::get('product/', 'create')->name('product.create');
        Route::post('product/', 'store')->name('product.store');
        Route::get('product/{ean}/edit', 'edit')->name('product.edit');
        Route::put('product/{ean}', 'update')->name('product.update');
        Route::delete('product/delete', 'delete')->name('product.delete');
        Route::delete('product/photo/delete', 'deletePhoto')->name('product.photo.delete');
        Route::post('product/photo/update', 'updatePhoto')->name('product.photo.update');

        Route::get('/search', 'search')->name('product.search');
        Route::get('/duplicates', 'duplicates')->name('product.duplicates');
        Route::get('/product/update/price', 'updatePrice')->name('product.update.price');
    });


    // Admin Promotions/raBATY
    Route::controller(PromotionController::class)->group(function(){
        Route::get('/rabaty', 'index')->name('promotion.index');
        Route::get('/rabaty/new', 'create')->name('promotion.create');

        Route::post('/rabaty/new', 'store')->name('promotion.store');

        Route::get('/rabaty/find', 'find')->name('promotion.find');
    });

    // Admin Categories
    Route::controller(CategoryController::class)->group(function(){
        Route::get('/categories', 'index')->name('categories.index');
        Route::get('/category/{name}', 'show')->name('category.show');
        Route::put('/category/edit', 'update')->name('category.update');
        Route::post('/category/create', 'create')->name('category.create');
        Route::delete('/category/delete', 'delete')->name('category.delete');
    });


    // Admin Orders
    Route::controller(OrderController::class)->group(function(){
        Route::get('orders', 'index')->name('orders.index');
        Route::get('/orders2', 'indexdwa')->name('orders.indexdwa');
        Route::get('order/makeit', 'create')->name('order.create');
        Route::get('order/{ref_number}', 'show')->name('order.show');
    });

    // Admin Purchases
    Route::controller(PurchaseController::class)->group(function(){
        Route::get('purhasches', 'index')->name('purchases');
    });

    // Admin Inventory
    Route::controller(StockController::class)->group(function(){
        Route::get('stocks', 'index');
        Route::get('stock/{ean}', 'show');
        Route::get('stock/history/{ean}', 'stockHistory');
    });

    // Admin Carousel
    Route::controller(CarouselController::class)->group(function(){
        Route::get('carousel', 'index')->name('carousel');
        Route::post('carousel', 'store')->name('carousel.store');
        Route::get('carousel/{id}', 'edit')->name('carousel.edit');
        Route::put('carousel/{id}', 'update')->name('carousel.update');
        Route::delete('carousel', 'delete')->name('carousel.delete');
    });

    // Admin Invoices
    Route::controller(InvoiceController::class)->group(function(){
        Route::get('invoices', 'index')->name('invoice.index');
        Route::get('invoice/{invoice_number}', 'show')->name('invoice.show');
        Route::post('invoice', 'store')->name('invoice.store');
        Route::get('invoice/{id}', 'edit')->name('invoice.edit');
        Route::put('invoice/{id}', 'update')->name('invoice.update');
        Route::delete('invoice', 'delete')->name('invoice.delete');
    });



});//End of Prefix maitenace