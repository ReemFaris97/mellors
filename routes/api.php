<?php

use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\HomeController;
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
Route::post('login',[AuthController::class,'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('home',[HomeController::class,'home']);
    Route::get('ride_preopening/{id}',[HomeController::class,'ridePreopening']);
    Route::get('ride_preclosing/{id}',[HomeController::class,'ridePreclosing']);
    Route::post('store_inspection',[HomeController::class,'storeInspection']);

});
