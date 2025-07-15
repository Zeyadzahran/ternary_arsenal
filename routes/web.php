<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\WeaponController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\InventoryController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DiscountController;
use Illuminate\Support\Facades\Mail;
use App\Mail\ProductSold;
use App\Models\User;

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

Route::resource('discounts', DiscountController::class)->middleware('auth');




Route::post('/cart/add/{product_id}', [App\Http\Controllers\CartController::class, 'addToCart'])->name('cart.addToCart');
Route::get('/cart', [App\Http\Controllers\CartController::class, 'showCart'])->name('cart.show');
Route::delete('/cart/remove/{order_id}', [App\Http\Controllers\CartController::class, 'removeFromCart'])->name('cart.remove');
Route::post('/cart/checkout', [App\Http\Controllers\CartController::class, 'checkout'])->name('cart.checkout');
Route::post('/cart/checkout/{order}', [App\Http\Controllers\CartController::class, 'checkoutSingle'])->name('cart.checkoutSingle');
Route::post('/cart/update/{order}', [App\Http\Controllers\CartController::class, 'updateQuantity'])->name('cart.update');


Route::get('/users', [UserController::class, 'index'])->name('user.index');
Route::patch('/users/{user}/role', [UserController::class, 'updateRole'])->name('user.updateRole');



Route::get('test', function () {
    \Illuminate\Support\Facades\Mail::to('tahanyemad30@gmail.com')->send(new \App\Mail\ProductSold());
    dd("doneee");
    return 'Done';
});
Route::get('/test-email', function () {
    Mail::to('your_email@example.com')->send(new ProductSold());
    return 'Email sent!';
});