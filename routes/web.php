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

Route::group(['middleware' => 'auth', 'as' => 'admin.'], function () {
    Route::get('/', 'Admin\IndexController')->name('index');

    Route::resource('roles', 'Admin\RoleController'); // done
    Route::resource('users', 'Admin\UserController'); // done
    Route::resource('departments', 'Admin\DepartmentController');

    Route::resource('branches', 'Admin\BranchController');//done
    Route::resource('parks', 'Admin\ParkController');//done
    Route::get('get_by_branch', 'Admin\ParkController@get_by_branch')->name('parks.get_by_branch');
    Route::resource('zones', 'Admin\ZoneController');//done
    Route::get('get_by_branch_id', 'Admin\ZoneController@get_by_branch')->name('zones.get_by_branch');


    Route::resource('park_times', 'Admin\ParkTimeController');//done
    Route::resource('game_times', 'Admin\GameTimeController');//done
    Route::PATCH('daily_entrance_count', 'Admin\ParkTimeController@add_daily_entrance_count')->name('park_times.daily_entrance_count');
    Route::get('/all-rides/{park_id}/{time_slot_id}', 'Admin\GameTimeController@all_rides');

    Route::get('/game-all-times/{id}', 'Admin\GameTimeController@all_times');

    Route::resource('game_cats', 'Admin\GameCategoryController');//done
    Route::resource('games', 'Admin\GameController');//done

    //operation
    Route::resource('stoppage-category', 'Admin\StoppageCategoryController');//done
    Route::resource('stoppage-sub-category', 'Admin\StoppageSubCategoryController');//done
    Route::resource('rides', 'Admin\RidesController');//done
    Route::Post('upload-rides-with-excel', 'Admin\RidesController@uploadExcleFile')->name('uploadExcleFile');
    Route::resource('rides-stoppages', 'Admin\RideStoppageController');//done
    Route::Post('upload-stoppages-with-excel', 'Admin\RideStoppageController@uploadStoppagesExcleFile')->name('uploadStoppagesExcleFile');
    Route::resource('rides-cycles', 'Admin\RideCyclesController');//done
    Route::Post('upload-cycles-with-excel', 'Admin\RideCyclesController@uploadCycleExcleFile')->name('uploadCycleExcleFile');

    Route::resource('queues', 'Admin\QueueController');//done
    Route::Post('upload-queues-with-excel', 'Admin\QueueController@uploadQueueExcleFile')->name('uploadQueueExcleFile');
    Route::get('/search_queues/', 'Admin\QueueController@search')->name('search');

    Route::resource('inspection_lists', 'Admin\InspectionListController');//done
    Route::resource('preopening_lists', 'Admin\PreopeningListController');//done
    Route::get('/add_preopening_list_to_ride/{id}', 'Admin\PreopeningListController@add_preopening_list_to_ride');
    Route::get('/zone_rides/{zone_id}', 'Admin\PreopeningListController@zone_rides');
    Route::resource('ride_inspection_lists', 'Admin\RideInspectionListController');

    Route::resource('customer_feedbacks', 'Admin\CustomerFeedbackController');//done
    Route::get('/search_customer_feedbacks/', 'Admin\CustomerFeedbackController@search')->name('searchCustomerFeedBack');


    Route::post('get-park-zones', 'Admin\GeneralController@getParkZones')->name('getParkZones');
    Route::post('get-sub-stoppages-categories', 'Admin\GeneralController@getSubStoppageCategories')->name('getSubStoppageCategories');
    Route::get('get_park_rides', 'Admin\GeneralController@getParkRides')->name('getParkRides');

    Route::resource('rsr_reports', 'Admin\RsrReportController');
    Route::get('rsr_reports/{id}/approve', 'Admin\RsrReportController@approve');
    Route::get('add_rsr_stoppage_report/{id}', 'Admin\RsrReportController@addRsrStoppageReport');

    Route::get('rides-status', 'Admin\ReportsController@rideStatus')->name('reports.rideStatus');

    Route::resource('incidents', 'Admin\IncidentController');
    Route::get('/add_incident_report/{ride_id}/{park_time_id}', 'Admin\IncidentController@add_incident_report');
    //Route::resource('questions','Admin\QuestionController');
    
    Route::resource('accidents', 'Admin\AccidentController');
    Route::get('/add_accident_report/{ride_id}/{park_time_id}', 'Admin\AccidentController@add_accident_report');
   

    Route::resource('health_and_safety_reports', 'Admin\HealthAndSafetyReportController');
    Route::get('/add_health_and_safety_report/{park_id}/{time_slot_id}', 'Admin\HealthAndSafetyReportController@add_health_and_safety_report');
    Route::get('/search_health_and_safety/', 'Admin\HealthAndSafetyReportController@search')->name('searchHealthAndSafetyReport');

    Route::resource('skill_game_reports', 'Admin\SkillGameReportController');
    Route::get('/add_skill_game_report/{park_id}/{time_slot_id}', 'Admin\SkillGameReportController@add_skill_game_report');
    Route::get('/search_skill_game_reports/', 'Admin\SkillGameReportController@search')->name('searchSkillGameReport');

    Route::resource('maintenance_reports', 'Admin\MaintenanceReportController');
    Route::get('/add_maintenance_report/{park_id}/{time_slot_id}', 'Admin\MaintenanceReportController@add_maintenace_report');
    Route::get('/search_maintenance_reports/', 'Admin\MaintenanceReportController@search')->name('searchMaintenanceReport');

    Route::resource('tech-reports', 'Admin\TechReportsController');
    Route::get('/add-tech-report/{park_id}/{time_slot_id}', 'Admin\TechReportsController@add_tech_report');
    Route::get('/search_tech_reports/', 'Admin\TechReportsController@search')->name('searchTechReport');

    Route::resource('ride-ops-reports', 'Admin\RideOpsReportsController');
    Route::get('/add-ride-ops-report/{park_id}/{time_slot_id}', 'Admin\RideOpsReportsController@add_ride_ops_report');
    Route::get('/search_ride_ops_reports/', 'Admin\RideOpsReportsController@search')->name('searchOpsReport');

});
/* Route::get('/', function () {
    return view('welcome');
}); */