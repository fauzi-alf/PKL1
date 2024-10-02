<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;


 
Route::middleware(["auth"])->group(function () {

    //route resource for products
    Route::get('/', [ProductController::class,'index']) ;
    Route::get('create', [ProductController::class,'create'])->name('products.create');
    Route::get('edit', [ProductController::class,'edit'])->name('products.edit');
    Route::resource('products', \App\Http\Controllers\ProductController::class);
    Route::get('/products/index', [RegisterController::class,'index'])->name('product');
    //route dashboard dan logout
    Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard.index');
    Route::get('/logout', [DashboardController::class,'logout'])->name('dashboard.logout');
});
//route Register login
Route::get('/register', [RegisterController::class,'index'])->name('register.index');
Route::post('/register', [RegisterController::class,'store'])->name('register.store');
Route::get('/register', [RegisterController::class,'index'])->name('register');
//route login

Route::get('/login', [LoginController::class,'index'])->name('login');
Route::post('/login', [LoginController::class,'check_login'])->name('login.check_login');