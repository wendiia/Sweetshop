<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProductController;
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



//Route::view('/', 'welcome')->name('index');

//Auth::routes(['register'=>false]);

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//// Admin dashboard
//Route::group(['prefix'=>'admin/', 'middleware'=>'auth'], function (){
//    Route::get('/', [AdminController::class, 'admin'])->name('admin');
//});
//
//// Banner section
//Route::resource('banner', BannerController::class);


// Тест на вывод фейковых данных с различных таблиц
//Route::get('/test', function () {
//   $users = \App\Models\User::with('orders')->get();
//   $users = \App\Models\User::all();
//   $categories = \App\Models\Category::all();
//   $sizes= \App\Models\Size::all();
//   return view('test', compact('sizes'));
//});


Route::get('/', [IndexController::class, 'index'])->name('index');
// Main
//Route::view('/', 'index')->name('index');
Route::view('/about', 'main.about')->name('about');
Route::view('/cart', 'main.cart')->name('cart');
Route::view('/profile', 'main.profile')->name('profile');


Route::resource('categories', CategoryController::class);
Route::resource('products', ProductController::class);




//Route::resource('categories/{category}/products', ProductController::class);
//Route::get('categories/{category}/products', [ProductController::class, 'index'])->named('category.products.index');




