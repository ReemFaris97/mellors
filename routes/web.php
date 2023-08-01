<?php

use App\Events\PrivetChatEvent;
use App\Events\RsrReportEvent;
use App\Events\timeSlotNotification;
use Illuminate\Http\Request;
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
Route::get('/summery', function () {
    return view('summery');
});
Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth', 'settimezone'], 'as' => 'admin.'], function () {
    Route::get('/', 'Admin\IndexController')->name('index');
    Route::get('statistics', 'Admin\IndexController@statistics')->name('statistics');
    Route::get('make_all_read', 'Admin\IndexController@makeAllRead')->name('makeAllRead');
    Route::get('all_notifications', 'Admin\IndexController@allNotifications')->name('allNotifications');
    Route::resource('roles', 'Admin\RoleController'); // done
    Route::resource('users', 'Admin\UserController'); // done
    Route::resource('departments', 'Admin\DepartmentController');

    Route::resource('branches', 'Admin\BranchController');//done
    Route::resource('parks', 'Admin\ParkController');//done
    Route::get('get_by_branch', 'Admin\ParkController@get_by_branch')->name('parks.get_by_branch');
    Route::resource('zones', 'Admin\ZoneController');//done
    Route::get('get_by_branch_id', 'Admin\ZoneController@get_by_branch')->name('zones.get_by_branch');


    Route::resource('park_times', 'Admin\ParkTimeController');//done
    Route::get('/search_park_times/', 'Admin\ParkTimeController@search');

    Route::resource('game_times', 'Admin\GameTimeController');//done
    Route::get('/edit_ride_time/{ride_id}/{park_time_id}', 'Admin\GameTimeController@edit_ride_time')->name('editRideTime');

    Route::PATCH('daily_entrance_count', 'Admin\ParkTimeController@add_daily_entrance_count')->name('park_times.daily_entrance_count');
    Route::get('/all-rides/{park_id}/{time_slot_id}', 'Admin\GameTimeController@all_rides');

    Route::get('/game-all-times/{id}', 'Admin\GameTimeController@all_times');

    Route::resource('ride_types', 'Admin\RideTypeController');
    Route::resource('games', 'Admin\GameController');//done

    //operation
    Route::resource('stoppage-category', 'Admin\StoppageCategoryController');//done
    Route::resource('stoppage-sub-category', 'Admin\StoppageSubCategoryController');//done
    Route::resource('rides', 'Admin\RidesController');//done
    Route::Post('upload-rides-with-excel', 'Admin\RidesController@uploadExcleFile')->name('uploadExcleFile');

    Route::resource('rides-stoppages', 'Admin\RideStoppageController');//done
    Route::get('/search_stoppages/', 'Admin\RideStoppageController@search')->name('searchStoppage');
    Route::Post('upload-stoppages-with-excel', 'Admin\RideStoppageController@uploadStoppagesExcleFile')->name('uploadStoppagesExcleFile');
    Route::Post('get-images', 'Admin\RideStoppageController@getImage')->name('getImage');
    Route::get('/show_stoppages/{ride_id}/{park_time_id}', 'Admin\RideStoppageController@show_stoppages')->name('showStoppages');
    Route::get('/add_stoppage/{ride_id}/{park_time_id}', 'Admin\RideStoppageController@add_stoppage')->name('addStoppage');
    Route::PATCH('update_stoppage_status', 'Admin\RideStoppageController@update_stoppage_status')->name('rides-stoppages.updateStoppageStatus');

    Route::resource('rides-cycles', 'Admin\RideCyclesController');//done
    Route::Post('upload-cycles-with-excel', 'Admin\RideCyclesController@uploadCycleExcleFile')->name('uploadCycleExcleFile');
    Route::get('/search_ride_cycle/', 'Admin\RideCyclesController@search')->name('searchRideCycle');
    Route::get('/show_cycles/{ride_id}/{park_time_id}', 'Admin\RideCyclesController@show_cycles')->name('showCycles');
    Route::get('/add_cycle/{ride_id}/{park_time_id}', 'Admin\RideCyclesController@add_cycle')->name('addCycle');

    Route::resource('queues', 'Admin\QueueController');//done
    Route::Post('upload-queues-with-excel', 'Admin\QueueController@uploadQueueExcleFile')->name('uploadQueueExcleFile');
    Route::get('/search_queues/', 'Admin\QueueController@search')->name('search');
    Route::get('/show_queues/{ride_id}/{park_time_id}', 'Admin\QueueController@show_queues')->name('showQueues');
    Route::get('/add_queue/{ride_id}/{park_time_id}', 'Admin\QueueController@add_queue')->name('addQueue');

    Route::resource('inspection_lists', 'Admin\InspectionListController');//done


    Route::resource('preopening_lists', 'Admin\PreopeningListController');//done
    Route::get('/add_preopening_list_to_ride/{ride_id}/{park_time_id}', 'Admin\PreopeningListController@add_preopening_list_to_ride');
    Route::get('/edit_preopening_list/{ride_id}/{park_time_id}/{created_date}', 'Admin\PreopeningListController@edit_ride_preopening_list')->name('editPreopeningList');
    Route::post('/update_preopening_list/{ride_id}/{created_date}', 'Admin\PreopeningListController@update_ride_preopening_list')->name('updatePreopeningList');
    Route::get('/cheack_preopening_list/', 'Admin\PreopeningListController@cheackPreopeningList')->name('cheackPreopeningList');
    Route::get('/show_preopening_list/{ride_id}/{park_time_id}', 'Admin\PreopeningListController@show_ride_preopening_list')->name('showPreopeningList');


    Route::get('/zone_rides/{zone_id}', 'Admin\PreopeningListController@zone_rides')->name('zoneRides');
    Route::resource('ride_inspection_lists', 'Admin\RideInspectionListController');
    Route::get('/add_ride_inspection_lists/{ride_id}', 'Admin\RideInspectionListController@add_ride_inspection_lists')->name('addRideInspectionLists');
    Route::get('/cheack_ride_inspection_lists/', 'Admin\RideInspectionListController@cheackRideInspectionList')->name('cheackRideInspectionList');
    Route::get('/edit_ride_inspection_lists/{ride_id}', 'Admin\RideInspectionListController@edit_ride_inspection_lists')->name('editRideInspectionLists');
    Route::post('/update_ride_inspection_lists/{ride_id}', 'Admin\RideInspectionListController@update_ride_inspection_lists')->name('updatRideInspectionLists');

    Route::resource('customer_feedbacks', 'Admin\CustomerFeedbackController');//done
    Route::get('/search_customer_feedbacks/', 'Admin\CustomerFeedbackController@search')->name('searchCustomerFeedBack');


    Route::get('get-park-zones', 'Admin\GeneralController@getParkZones')->name('getParkZones');
    Route::post('get-sub-stoppages-categories', 'Admin\GeneralController@getSubStoppageCategories')->name('getSubStoppageCategories');
    Route::get('get_park_rides', 'Admin\GeneralController@getParkRides')->name('getParkRides');

    Route::resource('rsr_reports', 'Admin\RsrReportController');//done
    Route::get('rsr_reports/{id}/approve', 'Admin\RsrReportController@approve');
    Route::get('add_rsr_stoppage_report/{id}', 'Admin\RsrReportController@addRsrStoppageReport');
    Route::Post('get-rsr-images', 'Admin\RsrReportController@getImage')->name('getRsrImage');

    Route::resource('availability_reports', 'Admin\AvailabilityReportController');
    Route::get('add-availability-report/{park_id}', 'Admin\AvailabilityReportController@addAvailabilityReport')->name('addAvailabilityReport');
    Route::get('show-availability-report', 'Admin\AvailabilityReportController@showAvailabilityReport')->name('reports.showAvailabilityReport');

    Route::get('rides-status', 'Admin\ReportsController@rideStatus')->name('reports.rideStatus');
    Route::get('operator-time-report', 'Admin\ReportsController@operatorTimeReport')->name('reports.operatorTimeReport');
    Route::get('show-operator-time-report', 'Admin\ReportsController@showOperatorTimeReport')->name('reports.showOperatorTimeReport');
    Route::get('stoppages-report', 'Admin\ReportsController@stoppagesReport')->name('reports.stoppagesReport');
    Route::get('show-stoppages-report', 'Admin\ReportsController@showstoppagesReport')->name('reports.showStoppagesReport');

    Route::resource('incidents', 'Admin\IncidentController');//done
    Route::get('/add_incident_report/{ride_id}/{park_time_id}', 'Admin\IncidentController@add_incident_report')->name('addIncidentReport');
    //Route::resource('questions','Admin\QuestionController');

    Route::resource('accidents', 'Admin\AccidentController');//done
    Route::get('/add_accident_report/{ride_id}/{park_time_id}', 'Admin\AccidentController@add_accident_report')->name('addAccidentReport');

    Route::resource('health_and_safety_reports', 'Admin\HealthAndSafetyReportController');//done
    Route::get('/add_health_and_safety_report/{park_id}/{time_slot_id}', 'Admin\HealthAndSafetyReportController@add_health_and_safety_report')->name('addHealthAndSafetyReport');
    Route::get('/edit_health_and_safety_report/{time_slot_id}', 'Admin\HealthAndSafetyReportController@edit_health_and_safety_report')->name('editHealthAndSafetyReport');
    Route::post('/updateRequest/', 'Admin\HealthAndSafetyReportController@update_request')->name('updateRequest');
    Route::get('/search_health_and_safety/', 'Admin\HealthAndSafetyReportController@search')->name('searchHealthAndSafetyReport');
    Route::get('/cheack_health/', 'Admin\HealthAndSafetyReportController@cheackHealth')->name('cheackHealth');
    /* Route::post('/updateRequest', function (Request $request) {
         dd('aaaaaaaaa');
     })->name('updateRequest');*/
    Route::resource('skill_game_reports', 'Admin\SkillGameReportController');//done
    Route::get('/add_skill_game_report/{park_id}/{time_slot_id}', 'Admin\SkillGameReportController@add_skill_game_report')->name('addSkillGameReport');
    Route::get('/edit_skill_game_report/{time_slot_id}', 'Admin\SkillGameReportController@edit_skill_game_report')->name('editSkillGameReport');
    Route::post('/updateskillGame/', 'Admin\SkillGameReportController@update_request')->name('updateskillGame');
    Route::get('/search_skill_game_reports/', 'Admin\SkillGameReportController@search')->name('searchSkillGameReport');
    Route::get('/cheack_skill_game/', 'Admin\SkillGameReportController@cheackSkillGame')->name('cheackSkillGame');

    Route::resource('maintenance_reports', 'Admin\MaintenanceReportController');//done
    Route::get('/add_maintenance_report/{park_id}/{time_slot_id}', 'Admin\MaintenanceReportController@add_maintenace_report')->name('addMaintenanceReport');
    Route::get('/edit_maintenance_report/{time_slot_id}', 'Admin\MaintenanceReportController@edit_maintenance_report')->name('editMaintenanceReport');
    Route::post('/updateMaintenance/', 'Admin\MaintenanceReportController@update_request')->name('updateMaintenance');
    Route::get('/search_maintenance_reports/', 'Admin\MaintenanceReportController@search')->name('searchMaintenanceReport');
    Route::get('/cheack_maintenance/', 'Admin\MaintenanceReportController@cheackMaintenance')->name('cheackMaintenance');

    Route::resource('tech-reports', 'Admin\TechReportsController');//done
    Route::get('/add-tech-report/{park_id}/{time_slot_id}', 'Admin\TechReportsController@add_tech_report')->name('addTechReport');
    Route::get('/edit_tech_report/{time_slot_id}', 'Admin\TechReportsController@edit_tech_report')->name('editTechReport');
    Route::post('/updateTechnical/', 'Admin\TechReportsController@update_request')->name('updateTechnical');
    Route::get('/search_tech_reports/', 'Admin\TechReportsController@search')->name('searchTechReport');
    Route::get('/cheack_tech/', 'Admin\TechReportsController@cheackTech')->name('cheackTech');

    Route::resource('ride-ops-reports', 'Admin\RideOpsReportsController');//done
    Route::get('/add-ride-ops-report/{park_id}/{time_slot_id}', 'Admin\RideOpsReportsController@add_ride_ops_report')->name('addOpsReport');
    Route::get('/edit_ride_ops_report/{time_slot_id}', 'Admin\RideOpsReportsController@edit_ride_ops_report')->name('editOpsReport');
    Route::post('/updateRideOps/', 'Admin\RideOpsReportsController@update_request')->name('updateRideOps');
    Route::get('/search_ride_ops_reports/', 'Admin\RideOpsReportsController@search')->name('searchOpsReport');
    Route::get('/cheack_ride_ops/', 'Admin\RideOpsReportsController@cheackRideOps')->name('cheackRideOps');

    Route::get('/search_duty_summary_reports/', 'Admin\DutySummaryController@search')->name('searchDutySummaryReport');

    Route::resource('duty-report', 'Admin\RideOpsReportsController');
    Route::get('inspection-list-report', 'Admin\ReportsController@inspectionListReport')->name('reports.inspectionListReport');
    Route::get('show-inspection-list-report', 'Admin\ReportsController@showInspectionListReport')->name('reports.showInspectionListReport');


    Route::resource('ride_parks', 'Admin\RideParkController');
    Route::get('/add_ride_park/{ride_id}', 'Admin\RideParkController@addRidePark')->name('addRidePark');
    Route::resource('ride_zones', 'Admin\RideZoneController');
    Route::get('/add_ride_zone/{ride_id}', 'Admin\RideZoneController@addRideZone')->name('addRideZone');

    Route::resource('user_parks', 'Admin\UserParkController');
    Route::get('/add_user_park/{user_id}', 'Admin\UserParkController@addUserPark')->name('addUserPark');

    Route::resource('user_zones', 'Admin\UserZoneController');
    Route::get('/add_user_zone/{user_id}', 'Admin\UserZoneController@addUserZone')->name('addUserZone');

    Route::resource('ride_users', 'Admin\RideUserController');
    Route::get('/add_ride_user/{ride_id}', 'Admin\RideUserController@addRideUser')->name('addRideUser');

    Route::resource('ride_preopen', 'Admin\RidePreopeningController');
    Route::get('/add_ride_preopen_elements/{ride_id}', 'Admin\RidePreopeningController@add_ride_preopen_elements');
    Route::get('/edit_ride_preopen_elements/{ride_id}', 'Admin\RidePreopeningController@edit_ride_preopen_elements');
    Route::post('/update_ride_preopen_elements/{ride_id}', 'Admin\RidePreopeningController@update_ride_preopen_elements')->name('updatRidePreopenElements');

    Route::resource('ride_preclose', 'Admin\RidePreclosingController');
    Route::get('/add_ride_preclose_elements/{ride_id}', 'Admin\RidePreclosingController@add_ride_preclose_elements');
    Route::get('/edit_ride_preclose_elements/{ride_id}', 'Admin\RidePreclosingController@edit_ride_preclose_elements');
    Route::post('/update_ride_preclose_elements/{ride_id}', 'Admin\RidePreclosingController@update_ride_preclose_elements')->name('updatRidePrecloseElements');

    Route::resource('observations', 'Admin\ObservationController');
    Route::get('/add_observation/{ride_id}', 'Admin\ObservationController@add_observation');

    Route::get('observation-report', 'Admin\ReportsController@observationReport')->name('reports.observationReport');
    Route::get('show_observation-report', 'Admin\ReportsController@showObservationReport')->name('reports.showObservationReport');

    Route::get('test', function () {

        event(new RsrReportEvent(2, 'qqq', 'ddd', 1));

        return "Event has been sent!";

    });

});
