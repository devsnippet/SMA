<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'HomeController@showWelcome');
Route::get('/account', 'AccountController@get_login');
Route::post('/account', 'AccountController@post_login');
Route::get('/account/logout', 'AccountController@get_logout');

Route::get('/api', 'ApiController@get');
Route::post('/api/login', 'UserController@post_login');
Route::get('/api/user/{id}', 'UserController@get_user');
Route::get('/api/students', 'StudentController@get_list');
Route::get('/api/student/{id}', 'StudentController@get_student');

Route::get('/test/js/apiroute', function(){
	return View::make('test.js.apiroute');
});
Route::get('/test/js/q', function(){
	return View::make('test.js.q');
});