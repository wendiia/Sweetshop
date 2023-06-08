<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\Authenticate;
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


// Main

Route::middleware(Session::class)->group(function () {



    Route::get('/', [IndexController::class, 'index'])->name('index');
    Route::view('/about', 'main.about')->name('about');
    Route::view('/profile', 'main.profile')->name('profile');


    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
    Route::resource('cart', CartController::class);

});
Route::get('register', [RegisterController::class, 'create'])->middleware('guest')->name('register.create');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest')->name('register.store');

Route::get('login', [LoginController::class, 'create'])->middleware('guest')->name('login.create');
Route::post('login', [LoginController::class, 'store'])->middleware('guest')->name('login.store');
Route::post('login/update', [LoginController::class, 'update'])->middleware('auth')->name('login.update');
Route::post('logout', [LoginController::class, 'destroy'])->middleware('auth')->name('login.destroy');


//Route::post('add-to-cart',[CartController::class,'addToCart'])->name('cart.addToCart');
Route::post('/cart/add/{id}', [CartController::class, 'addToCart'])->where('id', '[0-9]+')->name('cart.addToCart');
