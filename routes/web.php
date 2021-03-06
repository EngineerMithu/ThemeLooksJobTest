<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('user/edit/{user_id}',[App\Http\Controllers\HomeController::class,'edit']);
Route::post('user/update/{user_id}',[App\Http\Controllers\HomeController::class,'update']);
Route::get('user/delete/{user_id}',[App\Http\Controllers\HomeController::class,'delete']);


Route::get('/product',[App\Http\Controllers\ProductController::class,'index']);
Route::post('product/store',[App\Http\Controllers\ProductController::class,'newProduct'])->name('product/store');
Route::get('product/edit/{product_id}',[App\Http\Controllers\ProductController::class,'editProduct'])->name('product/edit');
Route::get('product/delete/{product_id}',[App\Http\Controllers\ProductController::class,'delectProduct']);
Route::post('product/update/{product_id}',[App\Http\Controllers\ProductController::class,'updateProduct']);
