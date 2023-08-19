<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Landing\LandingController;
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

Route::controller(LandingController::class)->name('landing.')->group( function() {
    Route::get('/', 'index')->name('index');
    Route::get('/category/{slug}', 'category')->name('category');
    Route::get('/product/{slug}', 'product')->name('product');
    Route::post('/cart/store', 'cartStore')->name('cart.store');
    Route::get('/cart', 'cart')->name('cart');
    Route::delete('/cart/delete/all/{id}', 'clearCart')->name('cart.clear');
});

Auth::routes();

Route::middleware(['auth','ceklevel:Admin'])->group(function () {
    Route::get('/admin', [App\Http\Controllers\HomeController::class, 'index'])->name('admin');

    Route::controller(ProfileController::class)->prefix('admin/profile')->name('admin.profile.')->group( function() {
        Route::get('/', 'index')->name('index');
        Route::patch('/', 'update')->name('update');
        // Route::patch('/{id}/update', 'update')->name('update');
        // Route::delete('/{id}/delete', 'delete')->name('delete');
    });

    Route::controller(CategoryController::class)->prefix('admin/category')->name('admin.category.')->group( function() {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
        Route::patch('/{id}/update', 'update')->name('update');
        Route::delete('/{id}/delete', 'delete')->name('delete');
    });

    Route::controller(ProductController::class)->prefix('admin/product')->name('admin.product.')->group( function() {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
        Route::patch('/{id}/update', 'update')->name('update');
        Route::delete('/{id}/delete', 'delete')->name('delete');
    });

    Route::controller(TransactionController::class)->prefix('admin/transaction')->name('admin.transaction.')->group( function() {
        Route::get('/', 'index')->name('index');
        // Route::post('/', 'store')->name('store');
        // Route::patch('/{id}/update', 'update')->name('update');
        // Route::delete('/{id}/delete', 'delete')->name('delete');
    });
});
