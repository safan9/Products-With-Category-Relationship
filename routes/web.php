<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CategoryController;
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

Route::get('/', [ShopController::class, 'index']);
Route::get('/{slug}/', [ShopController::class, 'show']);
Route::get('category/{slug}/', [ShopController::class, 'category_wise_products']);


Route::get('admin/category/', [CategoryController::class, 'index']);
Route::post('admin/category/', [CategoryController::class, 'store']);
Route::get('admin/category/{slug}/', [CategoryController::class, 'show']);
Route::delete('admin/category/{id}/', [CategoryController::class, 'destroy']);
Route::get('admin/category/{id}/edit', [CategoryController::class, 'edit']);
Route::patch('admin/category/{id}/', [CategoryController::class, 'update']);


Route::get('admin/product/', [ProductController::class, 'index']);
Route::get('admin/product/create/', [ProductController::class, 'create']);
Route::post('admin/product/', [ProductController::class, 'store']);
Route::delete('admin/product/{id}', [ProductController::class, 'destroy']);
Route::get('admin/product/{id}/edit', [ProductController::class, 'edit']);
Route::patch('admin/product/{id}/', [ProductController::class, 'update']);



