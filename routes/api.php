<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\ProductController;
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

Route::post("/login",[LoginController::class,'login']);
Route::post("/forget-password" , [ LoginController::class ,'forgetPassword']);
Route::post("/reset-password" , [ LoginController::class ,'resetPassword']);





# Api for Dashboard Users.......................
Route::middleware('auth:sanctum')->group( function () {

    Route::Resource("/categories",CategoryController::class);
    Route::Resource("/products",ProductController::class);
    Route::post("/get-brands",[ProductController::class,'getBrands']);
    Route::post("/get-product-unit",[ProductController::class,'getProductUnit']);

    Route::Resource("/inventories",InventoryController::class);

});