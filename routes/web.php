<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\LoginController;
use App\Http\Middleware\Session;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware(Session::class)->group(function () {
    // Main
    Route::get('/', [IndexController::class, 'index'])->name('index');
    Route::view('/about', 'main.about')->name('about');
    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
    Route::resource('cart', CartController::class); // убрать ваще

    // Authorization
    Route::get('register', [RegisterController::class, 'create'])->middleware('guest')->name('register.create');
    Route::post('register', [RegisterController::class, 'store'])->middleware('guest')->name('register.store');

    Route::get('login', [LoginController::class, 'create'])->middleware('guest')->name('login.create');
    Route::post('login', [LoginController::class, 'store'])->middleware('guest')->name('login.store');
    Route::post('login/update', [LoginController::class, 'update'])->middleware('auth')->name('login.update');
    Route::post('logout', [LoginController::class, 'destroy'])->middleware('auth')->name('login.destroy');

    // Cart
    Route::post('add-to-cart',[CartController::class,'addToCart'])->name('cart.addToCart');
    Route::post('delete-all-cart',[CartController::class,'deleteAllCart'])->name('cart.deleteAllCart');
    Route::post('delete-product',[CartController::class,'deleteProduct'])->name('cart.deleteProduct');
    Route::post('count-minus-plus',[CartController::class,'countMinusPlus'])->name('cart.countMinusPlus');

    // Order
    Route::post('order', [OrderController::class,'store'])->name('order.store');

    // Profile
    Route::get('/profile', [ProfileController::class,'index'])->name('profile.index');
});
