<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post("/login",[\App\Http\Controllers\Auth\LoginController::class,'login']);
Route::post("/forget-password" , [ \App\Http\Controllers\Auth\LoginController::class ,'forgetPassword']);
Route::post("/reset-password" , [ \App\Http\Controllers\Auth\LoginController::class ,'resetPassword']);



# Api for Dashboard Users.......................
Route::middleware('auth:sanctum')->group( function () {

    Route::Resource("/categories",\App\Http\Controllers\CategoryController::class);
    Route::Resource("/products",\App\Http\Controllers\ProductController::class);
    Route::post("/get-brands",[\App\Http\Controllers\ProductController::class,'getBrands']);
    Route::post("/get-product-unit",[\App\Http\Controllers\ProductController::class,'getProductUnit']);

    Route::Resource("/inventories",\App\Http\Controllers\InventoryController::class);
    Route::Resource("/vendor" , \App\Http\Controllers\VendorController::class);
    Route::Resource("/master-glossary" , \App\Http\Controllers\MasterGlossaryController::class);

});