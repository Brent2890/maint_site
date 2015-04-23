<?php


Route::resource('/', 'MaintenanceLogController');

Route::get('/input/confirm', 'MaintenanceLogController@confirm');
Route::get('/logs', 'MaintenanceLogController@index');
Route::get('/input_log', 'MaintenanceLogController@input');
Route::post('/input_log', 'MaintenanceLogController@store');

Route::get('/schedule', 'MaintenanceScheduleController@index');
Route::get('/input_schedule', 'MaintenanceScheduleController@input');
Route::post('/input_schedule', 'MaintenanceScheduleController@store');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
