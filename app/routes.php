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

Route::get('/', function()
{
	$results = DB::select('select * from users where userid = ?',array(3));
	
	return $results;
	
	return View::make('home.index');
});
Route::get('user/register', 'UserController@getRegister');
Route::post('user/register', array('before' => 'csrf','UserController@postRegister'));
Route::get('user/login', 'UserController@getLogin');
Route::post('user/login', array('before' => 'csrf','UserController@postLogin'));
Route::get('user/logout', 'UserController@getLogout');

/*
Event::listen('404', function() {
	return Response::error('404');
});
*/