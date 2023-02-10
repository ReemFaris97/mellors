<?php

use Illuminate\Support\Facades\Route;

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

//Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth','as'=>'admin.'], function () {
    Route::get('/', 'Admin\IndexController')->name('index');

    Route::resource('roles','Admin\RoleController'); // done
    Route::resource('users','Admin\UserController'); // done
    Route::resource('departments','Admin\DepartmentController');

    Route::resource('branches','Admin\BranchController');//done
    Route::resource('parks','Admin\ParkController');//done
    Route::get('get_by_branch', 'Admin\ParkController@get_by_branch')->name('parks.get_by_branch');
    Route::resource('zones','Admin\ZoneController');//done
    Route::get('get_by_branch_id', 'Admin\ZoneController@get_by_branch')->name('zones.get_by_branch');


    Route::resource('park_times','Admin\ParkTimeController');//done
    Route::resource('game_times','Admin\GameTimeController');//done
    Route::PATCH('daily_entrance_count', 'Admin\ParkTimeController@add_daily_entrance_count')->name('park_times.daily_entrance_count');

    Route::get('/game-all-times','Admin\GameTimeController@all_times');

    Route::resource('game_cats','Admin\GameCategoryController');//done
    Route::resource('games','Admin\GameController');//done

   //operation
    Route::resource('stoppage-category','Admin\StoppageCategoryController');//done
    Route::resource('stoppage-sub-category','Admin\StoppageSubCategoryController');//done
    Route::resource('rides','Admin\RidesController');//done
    Route::Post('upload-rides-with-excel','Admin\RidesController@uploadExcleFile')->name('uploadExcleFile');//done
    Route::resource('rides-stoppages','Admin\RideStoppageController');//done
    Route::Post('upload-stoppages-with-excel','Admin\RideStoppageController@uploadStoppagesExcleFile')->name('uploadStoppagesExcleFile');//done
     Route::resource('rides-cycles','Admin\RideCyclesController');//done
    Route::Post('upload-cycles-with-excel','Admin\RideCyclesController@uploadCycleExcleFile')->name('uploadCycleExcleFile');//done

    Route::resource('queues','Admin\QueueController');
    Route::Post('upload-queues-with-excel','Admin\QueueController@uploadQueueExcleFile')->name('uploadQueueExcleFile');//done
    Route::get('/search_queues/', 'Admin\QueueController@search')->name('search');

    Route::resource('inspection_lists','Admin\InspectionListController');//done
    Route::resource('preopening_lists','Admin\PreopeningListController');//done
    Route::get('/add_preopening_list/{zone_id}', 'Admin\PreopeningListController@add_preopening_list');

    Route::resource('customer_feedbacks','Admin\CustomerFeedbackController');//done
    Route::get('/search_customer_feedbacks/', 'Admin\CustomerFeedbackController@search')->name('searchCustomerFeedBack');


    Route::post('get-park-zones','Admin\GeneralController@getParkZones')->name('getParkZones');
    Route::post('get-sub-stoppages-categories','Admin\GeneralController@getSubStoppageCategories')->name('getSubStoppageCategories');


});
