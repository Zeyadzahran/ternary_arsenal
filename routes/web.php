<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\WeaponController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\InventoryController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;
use Cloudinary\Cloudinary;

Route::get('/test-cloud', function () {
    $cloudinary = new Cloudinary([
        'cloud' => [
            'cloud_name' => 'ddlxp23kv',
            'api_key'    => '733545292878257',
            'api_secret' => 'dRMOVMKJqzfB2M1TqakL8bfI6Hw',
        ]
    ]);

    return $cloudinary->image('sample')->toUrl();
});

Route::get('/check-config', function () {
    dd(config('cloudinary.cloud_url'));
});


Route::view('/', 'welcome');







Route::get('/register', [RegisterController::class, 'create'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);
Route::get('/login', [LoginController::class, 'create'])->name('login');
Route::post('/login', [LoginController::class, 'store']);
Route::post('logout', [LoginController::class, 'destroy']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile/delete', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// Route::get('/product/live-search', [ProductController::class, 'liveSearch']);
Route::resource('product', ProductController::class);
Route::get('/product/{id}/buy', [ProductController::class, 'showBuyPage'])->name('product.buy');
Route::post('/product/{id}/buy', [ProductController::class, 'buy'])->name('product.buy');
