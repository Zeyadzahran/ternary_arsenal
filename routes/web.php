<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\WeaponController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\InventoryController;
use Illuminate\Support\Facades\Auth;



Route::view('/', 'welcome');



Route::get('/home',function(){
    return view('user.index');
})->middleware('auth');


Route::get('/product',function(){
    return view('product.index');
});

Route::get('/profile',function(){
    return view('user.profile');
});

Route::get('/register', [RegisterController::class, 'create']);
Route::post('/register', [RegisterController::class, 'store']);
Route::get('/login', [LoginController::class, 'create'])->name('login');
Route::post('/login', [LoginController::class, 'store']);
Route::post('logout', [LoginController::class, 'destroy']); 



Route::resource('product', ProductController::class);


Route::get('/product/{id}/buy', [ProductController::class, 'showBuyPage'])->name('product.buy');
Route::post('/product/{id}/buy', [ProductController::class, 'buy'])->name('product.buy');
