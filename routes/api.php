<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login' , [\App\Http\Controllers\authController::class , 'login']);
Route::get('get-all-types' , [\App\Http\Controllers\authController::class , 'get_all_types']);
Route::post('add-order-type' , [\App\Http\Controllers\authController::class , 'add_order_type']);
Route::get('get-maintanance-type' , [\App\Http\Controllers\authController::class , 'get_maintanance_order_type']);

Route::post('add-to-gallary' , [\App\Http\Controllers\authController::class , 'store_gallary']);
Route::get('get-gallary' , [\App\Http\Controllers\authController::class , 'get_gallary']);


Route::get('admin-orders' , [\App\Http\Controllers\OrderController::class , 'admin_orders'])->middleware('auth:sanctum');


Route::post('register' , [\App\Http\Controllers\authController::class , 'register']);
Route::post('create-admin' , [\App\Http\Controllers\authController::class , 'create_admin']);
// Route::post('create-sub-type' , [\App\Http\Controllers\authController::class , 'create_maintanance_type']);
// Route::get('get-sub-type' , [\App\Http\Controllers\authController::class , 'get_maintanance_type']);
/////////////////////////////////////////////////////////////////////////////////////////////////
Route::get('category-index' , [\App\Http\Controllers\CategoryController::class , 'index']);
Route::post('category-store', [\App\Http\Controllers\CategoryController::class , 'store']);
Route::get('category-delete/{id}' , [\App\Http\Controllers\CategoryController::class , 'delete']);
Route::post('category-update/{id}', [\App\Http\Controllers\CategoryController::class , 'update']);
////////////////////////////////////////////////////////////////////////////////////////////////
Route::get('product-index' , [\App\Http\Controllers\ProductController::class , 'index']);
Route::post('product-store', [\App\Http\Controllers\ProductController::class , 'store']);
Route::get('product-delete/{id}' , [\App\Http\Controllers\ProductController::class , 'delete']);
Route::post('product-update/{id}', [\App\Http\Controllers\ProductController::class , 'update']);
////////////////////////////////////////////////////////////////////////////////////////////////
Route::post('order-store', [\App\Http\Controllers\OrderController::class , 'make_order'])->middleware('auth:sanctum');
Route::get('order-index', [\App\Http\Controllers\OrderController::class , 'get_all_orders']);
Route::get('my-order', [\App\Http\Controllers\OrderController::class , 'get_my_orders_as_admin'])->middleware('auth:sanctum');
Route::get('my-user-order', [\App\Http\Controllers\OrderController::class , 'get_my_orders_as_user'])->middleware('auth:sanctum');
Route::post('give-order/{id}', [\App\Http\Controllers\OrderController::class , 'give_order']);

Route::get('product-category', [\App\Http\Controllers\ProductController::class , 'get_product_with_category']);

