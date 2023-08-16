<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\DiscountController;
use App\Http\Controllers\Admin\InstalmentController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Customer\OrderController;
use App\Http\Controllers\Customer\PaymentController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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

//Route::get('/', function () {
//    return view('welcome');
//});


Route::prefix('admin')->namespace('Admin')->group(function (){

    Route::get('/', [AdminDashboardController::class, 'index'])->name('admin.home');

    //discount
    Route::prefix('offer')->group(function () {

        Route::get('/discount', [DiscountController::class, 'index'])->name('admin.market.offer.discount');
        Route::get('/discount/create', [DiscountController::class, 'create'])->name('admin.market.offer.discount.create');
        Route::post('/discount/store', [DiscountController::class, 'store'])->name('admin.market.offer.discount.store');
        Route::get('/discount/edit/{discount}', [DiscountController::class, 'edit'])->name('admin.market.offer.discount.edit');
        Route::put('/discount/update/{discount}', [DiscountController::class, 'update'])->name('admin.market.offer.discount.update');
        Route::delete('/discount/destroy/{discount}', [DiscountController::class, 'destroy'])->name('admin.market.offer.discount.destroy');

    });

    //instalment
    Route::prefix('buy')->group(function () {
        Route::get('/instalment', [InstalmentController::class, 'index'])->name('admin.market.buy.instalment');
        Route::get('/instalment/create', [InstalmentController::class, 'create'])->name('admin.market.buy.instalment.create');
        Route::post('/instalment/store', [InstalmentController::class, 'store'])->name('admin.market.buy.instalment.store');
        Route::get('/instalment/edit/{instalment}', [InstalmentController::class, 'edit'])->name('admin.market.buy.instalment.edit');
        Route::put('/instalment/update/{instalment}', [InstalmentController::class, 'update'])->name('admin.market.buy.instalment.update');
        Route::delete('/instalment/destroy/{instalment}', [InstalmentController::class, 'destroy'])->name('admin.market.buy.instalment.destroy');
    });

    //product
    Route::prefix('product')->group(function (){

        Route::get('/', [ProductController::class, 'index'])->name('admin.market.product.index');
        Route::get('/create', [ProductController::class, 'create'])->name('admin.market.product.create');
        Route::post('/store', [ProductController::class, 'store'])->name('admin.market.product.store');
        Route::delete('/destroy/{product}', [ProductController::class, 'destroy'])->name('admin.market.product.destroy');

    });

});

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::prefix('customer')->namespace('Admin')->group(function (){

    //cart
    Route::prefix('cart')->group(function (){
        Route::get('/', [OrderController::class, 'cart'])->name('customer.cart');
        Route::post('/create/{product}', [OrderController::class, 'cartCreate'])->name('customer.cart.create');
    });

    //payment
    Route::prefix('payment')->group(function (){
        Route::post('/create/{order}', [PaymentController::class, 'create'])->name('customer.payment.create');
    });

});
