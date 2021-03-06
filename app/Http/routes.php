<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');
Route::post('auth/verify', 'Auth\AuthController@verifyLogin');

Route::group(['prefix' => 'admin', 'namespace' => '\Admin', 'middleware' => ['auth']], function() {

    Route::get('/', 'principalController@index');
    Route::resource('/user','UserController');
    Route::resource('/cliente','ClienteController');
    Route::resource('/asignacion','AsignacionController');
    Route::get('/asignacion/crear/{id}','AsignacionController@crear');
    Route::get('/asignacion/actualizar/{id}','AsignacionController@actualizar');


});
