<?php

use App\Http\Controllers\backend\BannerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\backend\BrandController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\ContactController;
use App\Http\Controllers\frontend\ContactController as LienHeController;
use App\Http\Controllers\backend\MenuController;
use App\Http\Controllers\backend\OrderController;
use App\Http\Controllers\backend\PostController;
use App\Http\Controllers\backend\ProductController;
use App\Http\Controllers\backend\TopicController;
use App\Http\Controllers\backend\UserController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::resource('lien-he', LienHeController::class);
Route::resource('brand', BrandController::class);
Route::resource('category', CategoryController::class);
Route::resource('product', ProductController::class);
Route::resource('contact', ContactController::class);
Route::resource('menu', MenuController::class);
Route::resource('user', UserController::class);
Route::resource('banner', BannerController::class);
Route::resource('post', PostController::class);
Route::resource('topic', TopicController::class);
Route::resource('order', OrderController::class);
