<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\CartController;
use App\Services\CurrencyService;

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

Route::get('/test-currency', function (CurrencyService $currency) {
    return $currency->convert(100, 'USD', 'EUR');

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

Route::resource('discounts', DiscountController::class)->middleware('auth');




Route::post('/cart/add/{product_id}', [CartController::class, 'addToCart'])->name('cart.addToCart');
Route::get('/cart', [CartController::class, 'showCart'])->name('cart.show');
Route::delete('/cart/remove/{order_id}', [CartController::class, 'removeFromCart'])->name('cart.remove');
Route::post('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
Route::post('/cart/checkout/{order}', [CartController::class, 'checkoutSingle'])->name('cart.checkoutSingle');
Route::post('/cart/update/{order}', [CartController::class, 'updateQuantity'])->name('cart.update');

Route::middleware('auth')->group(function () {
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::patch('/users/{user}/role', [UserController::class, 'updateRole'])->name('users.updateRole');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
});
