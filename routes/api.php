<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('product',[ProductController::class, 'getAllProduct']);
Route::get('product/{id}',[ProductController::class, 'findProduct']);
Route::post('product',[ProductController::class, 'addProduct']);
Route::put('product/edit/{id}',[ProductController::class, 'updateProduct']);
Route::delete('product/delete/{id}',[ProductController::class, 'deleteProduct']);
