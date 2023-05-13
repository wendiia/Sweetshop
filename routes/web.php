<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BannerController;
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

Route::view('/', 'index')->name('index');
Auth::routes(['register'=>false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Admin dashboard
Route::group(['prefix'=>'admin/', 'middleware'=>'auth'], function (){
    Route::get('/', [AdminController::class, 'admin'])->name('admin');
});

// Banner section
Route::resource('banner', BannerController::class);

Route::view('/test', 'test');



// Main

Route::view('/products', 'main.products.products')->name('products');

Route::view('/product', 'main.products.product')->name('product');

Route::view('/about', 'main.about')->name('about');

Route::view('/cart', 'main.cart')->name('cart'); // !!!! спроси потом насчет адресса корректного !!!!
Route::view('/profile', 'main.profile')->name('profile'); // !!!! спроси потом насчет адресса корректного !!!!