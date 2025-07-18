<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    RegisterController,
    LoginController,
    ProductController,
    ProfileController,
    UserController,
    DiscountController,
    CartController,
    MailController,
    ReportController
};

Route::view('/', 'welcome');

Route::get('/register', [RegisterController::class, 'create'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);
Route::get('/login', [LoginController::class, 'create'])->name('login');
Route::post('/login', [LoginController::class, 'store']);
Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');

Route::middleware('auth')->group(function () {
    // Profile
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile/delete', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Cart
    Route::post('/cart/add/{product_id}', [CartController::class, 'addToCart'])->name('cart.addToCart');
    Route::get('/cart', [CartController::class, 'showCart'])->name('cart.show');
    Route::delete('/cart/remove/{order_id}', [CartController::class, 'removeFromCart'])->name('cart.remove');
    Route::post('/cart/update/{order}', [CartController::class, 'updateQuantity'])->name('cart.update');

    // Checkout via email
    Route::get('/checkout/confirm', [CartController::class, 'checkoutFromEmail'])->name('checkout.from.email');
    Route::post('/checkout/send-email', [CartController::class, 'sendCheckoutEmail'])->name('cart.email.checkout');

    // Weapon Request (normal users)
    Route::get('/send-request', [ReportController::class, 'showWeaponRequestForm'])->name('request.form');
    Route::post('/send-request', [ReportController::class, 'handleWeaponRequest'])->name('request.send');
});

Route::resource('product', ProductController::class)->only(['index', 'show']);

//  Admin Only
Route::middleware(['auth', 'isAdmin'])->group(function () {
    // Product Management
    Route::patch('/products/{id}/toggle-ban', [ProductController::class, 'toggleBan'])->name('products.toggleBan');
    Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
    Route::post('/product', [ProductController::class, 'store'])->name('product.store');
    Route::get('/product/{product}/edit', [ProductController::class, 'edit'])->name('product.edit');
    Route::put('/product/{product}', [ProductController::class, 'update'])->name('product.update');
    Route::delete('/product/{product}', [ProductController::class, 'destroy'])->name('product.destroy');

    // Reports 
    Route::get('/send-report', [ReportController::class, 'showStockReportForm'])->name('report.form');
    Route::post('/send-report', [ReportController::class, 'sendStockReport'])->name('report.send');

    // Discount Management
    Route::resource('discounts', DiscountController::class);

    // User Management
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::patch('/users/{user}/role', [UserController::class, 'updateRole'])->name('users.updateRole');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
});
