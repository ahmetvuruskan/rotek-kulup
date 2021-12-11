<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Auth;

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


Route::prefix('admin')->group(function () {
    Route::get('cikis-yap', function () {
        Auth::logout();
        return redirect(\route('admin.login'));
    })->name('admin.logout');

    Route::get('/', [IndexController::class, 'login'])->middleware('loginCheck')->name('admin.login');
    Route::post('giris-kontrol', [IndexController::class, 'authCheck'])->name('admin.usercheck');
    Route::middleware('sessionCheck')->group(function () {
        Route::get('anasayfa', [IndexController::class, 'index'])->name('admin.index');
        Route::prefix('urunler')->group(function () {
            Route::get('/', [ProductController::class, 'index'])->name('admin.products');
            Route::get('yeni-ekle', [ProductController::class, 'addNew'])->name('admin.products.add');
            Route::post('urun-kaydet', [ProductController::class, 'insert'])->name('admin.product.insert');
            Route::get('duzenle/{slug}', [ProductController::class, 'edit'])->name('admin.product.edit');
            Route::post('urun-duzenle', [ProductController::class, 'update'])->name('admin.product.update');
        });
        Route::prefix('uyeler')->group(function(){
            
        });
    });
});


