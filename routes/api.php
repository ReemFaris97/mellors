<?php

use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\RideController;
use App\Http\Controllers\Api\RideStoppageController;
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

Route::middleware(['auth:sanctum','settimezone'])->group(function () {
    // operators
    Route::get('home',[RideController::class,'home']);
    Route::get('settings',[RideController::class,'timeSlot']);

    Route::get('ride/{id}',[RideController::class,'ride']);
    Route::get('ride_preopening/{id}',[RideController::class,'ridePreopening']);
    Route::get('ride_preclosing/{id}',[RideController::class,'ridePreclosing']);
    Route::post('store_inspection',[RideController::class,'storeInspection']);

    Route::get('get_ride_status',[RideController::class,'rideStatus']);
    Route::post('add_ride_stoppage',[RideStoppageController::class,'addRideStoppage']);
    Route::get('get_ride_stoppages/{id}',[RideStoppageController::class,'getRideStoppages']);
    Route::post('update_stoppage',[RideStoppageController::class,'UpdateRideStoppages']);

    Route::post('reopen',[RideStoppageController::class,'reopen']);

    Route::post('add_cycle',[RideController::class,'addCycle']);
    Route::post('update_cycle_count',[RideController::class,'updateCycleCount']);
    Route::post('update_cycle_duration',[RideController::class,'updateCycleDuration']);

    Route::post('add_queues',[RideController::class,'addQueues']);
    Route::post('stop_queues',[RideController::class,'stopQueues']);

    //zone supervisor
    Route::get('home_zone_supervisor',[SupervisorController::class,'home']);
    Route::get('preopening_list/{id}',[SupervisorController::class,'preopeningList']);
    Route::get('preclosing_list/{id}',[SupervisorController::class,'preclosingList']);
    Route::post('add_feedback',[SupervisorController::class,'storeCustomerFeedback']);
    Route::post('update_inspection',[SupervisorController::class,'updateInspectionList']);

    Route::post('logout',[AuthController::class,'logout']);



});
