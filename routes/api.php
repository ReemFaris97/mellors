<?php

use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\RideController;
use App\Http\Controllers\Api\SupervisorController;
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
    // operators
    Route::get('home',[RideController::class,'home']);
    Route::get('time_slot',[RideController::class,'timeSlot']);

    Route::get('ride/{id}',[RideController::class,'ride']);
    Route::get('ride_preopening/{id}',[RideController::class,'ridePreopening']);
    Route::get('ride_preclosing/{id}',[RideController::class,'ridePreclosing']);
    Route::post('store_inspection',[RideController::class,'storeInspection']);

    Route::get('get_ride_status',[RideController::class,'rideStatus']);
    Route::post('add_ride_stoppage',[RideController::class,'addRideStoppage']);

    Route::post('reopen',[RideController::class,'reopen']);

    Route::post('add_cycle',[RideController::class,'addCycle']);
    Route::post('update_cycle_count',[RideController::class,'updateCycleCount']);
    Route::post('update_cycle_duration',[RideController::class,'updateCycleDuration']);

    Route::post('add_queues',[RideController::class,'addQueues']);
    Route::post('stop_queues',[RideController::class,'stopQueues']);

    //zone supervisor
    Route::get('home_zone_supervisor',[SupervisorController::class,'home']);
    Route::get('preopening_list/{id}',[SupervisorController::class,'preopeningList']);
    Route::post('add_feedback',[SupervisorController::class,'storeCustomerFeedback']);

    Route::post('logout',[AuthController::class,'logout']);



});
