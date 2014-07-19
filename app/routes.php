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

Route::group(array(), function()
{
	Route::get('service/getvalidcode', 'ServiceController@getValidCode');
	
	Route::get('user/register', 'UserController@getRegister');
	Route::post('user/register', array('before' => 'csrf', 'UserController@postRegister'));
	
	Route::get('user/login', 'UserController@getLogin');
	Route::post('user/login',  array('before' => 'csrf', 'UserController@postLogin'));
});

Route::group(array('before' => 'auth'), function()
{
    Route::get('user/logout', 'UserController@getLogout');
    
    Route::get('/', function()
    {
    	$results = DB::select('select * from users where userid = ?',array(3));
    	
    	// return var_dump($results[0]->userid);
    	return View::make('home.index',array('result'=>$results[0]));
    });
});

Route::group(array('namespace' => 'Admin'), function()
{
	//
});

/*
Event::listen('404', function() {
	return Response::error('404');
});
*/