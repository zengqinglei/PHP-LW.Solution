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

Route::model('user', 'User');
Route::bind('user', function($value, $route)
{
	return User::where('usermail', $value)->first();
});
Route::group(array(), function()
{
	Route::get('service/getvalidcode', 'ServiceController@getValidCode');
	
	Route::get('user/register', 'UserController@getRegister');
	Route::post('user/register', array('before' => 'csrf', 'UserController@postRegister'));
	
	Route::get('user/login/{user}', 'UserController@getLogin');
	Route::post('user/login',  array('before' => 'csrf','uses' => 'UserController@postLogin'));
    
    Route::get('spree/p_xrzxlp', 'SpreeController@getP_XRZXLP');
    Route::get('spree/p_lhb', 'SpreeController@getP_LHB');
    Route::get('spree/p_hdjs', 'SpreeController@getP_HDJS');
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