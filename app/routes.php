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
	Route::post('user/register', array('before' => 'csrf','uses' => 'UserController@postRegister'));
	
	Route::get('user/login', 'UserController@getLogin');
	Route::post('user/login',  array('before' => 'csrf','uses' => 'UserController@postLogin'));
    
    Route::get('spree/p_xrzxlp', 'SpreeController@getP_XRZXLP');
    Route::get('spree/p_lhb', 'SpreeController@getP_LHB');
    Route::post('spree/p_lhb',array('before' => 'csrf','uses' =>  'SpreeController@postP_LHB'));
    Route::get('spree/p_hdjs', 'SpreeController@getP_HDJS');
    Route::get('spree/p_gyhb', 'SpreeController@getP_GYHB');
    Route::get('spree/p_hbjl', 'SpreeController@getP_HBJL');
    Route::get('spree/p_rhlhb', 'SpreeController@getP_RHLHB');
    Route::get('spree/p_rhsm2wm', 'SpreeController@getP_RHSM2WM');
    Route::get('spree/p_yqhylhb', 'SpreeController@getP_YQHYLHB');
    Route::get('spree/p_yqhylhb2', 'SpreeController@getP_YQHYLHB2');
});

Route::group(array('before' => 'auth'), function()
{
    Route::get('user/logout', 'UserController@getLogout');
    
    Route::get('/', 'HomeController@getIndex');
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