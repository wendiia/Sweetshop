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

Route::view('/', 'welcome');

Auth::routes(['register'=>false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Admin dashboard
Route::group(['prefix'=>'admin/', 'middleware'=>'auth'], function (){
    Route::get('/', [AdminController::class, 'admin'])->name('admin');
});

// Banner section
Route::resource('banner', BannerController::class);

Route::view('/test', 'test');
