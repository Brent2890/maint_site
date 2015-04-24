<?php

Route::get('/', 'MaintenanceLogController@index');
Route::get('/logs', 'MaintenanceLogController@index');
Route::get('/input_log', 'MaintenanceLogController@input');
Route::post('/input_log', 'MaintenanceLogController@store');

Route::get('/schedule', 'MaintenanceScheduleController@index');
Route::get('/input_schedule', 'MaintenanceScheduleController@input');
Route::post('/input_schedule', 'MaintenanceScheduleController@store');

Route::get('account_details/add_vehicle', 'VehicleController@index');
Route::post('account_details/add_vehicle', 'VehicleController@store');

Route::get('account_details/add_maintenance', 'MaintenanceTypeController@index');
Route::post('account_details/add_maintenance', 'MaintenanceTypeController@store');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
