<?php


Route::resource('/', 'LogController');

Route::get('/input/confirm', 'LogController@confirm');
Route::get('/', 'LogController@index');
Route::get('/input', 'LogController@input');
Route::get('/schedule', 'LogController@schedule');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
