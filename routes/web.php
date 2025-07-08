<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\InventoryController;
use Illuminate\Support\Facades\Auth;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/register', function () {
    return view('auth.register');
});
Route::get('/home',function(){
    return view('auth.home');
})->middleware('auth');

Route::post('/register', [RegisterController::class, 'store']);
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');



// Route::get('/products', [ProductController::class, 'index'])->name('products.index');
// Route::post('/products/{id}/buy', [ProductController::class, 'buy'])->name('buy');

// Route::get('/inventory', [InventoryController::class, 'index'])->name('inventory');
Route::get('/products',function(){
    return view('auth.products');
});
Route::get('/inventory',function(){
    return view('auth.inventory');
});
