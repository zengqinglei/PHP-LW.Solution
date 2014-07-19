<?php

use Illuminate\Support\Facades\Auth;

class UserController extends BaseController {
	// 客户注册
	public function getRegister(){
		return View::make('user.register',array('submit_error'=>'注册结果！'));
	}
	
	// 客户登录
	public function getLogin()
	{
		return View::make('user.login',array('submit_error'=>'登录结果'));
	}
	public function postLogin($usermail,$passowrd,$backurl)
	{
		if (Auth::attempt(array('usermail' => $usermail, 'password' => $password)))
		{
			return Redirect::intended('dashboard');
		}
	}	
	
	// 客户登出
	public function getLogout(){
		return  View::make('user.login');
	}
	public function postLogout(){
		Auth::logout();
	}
}
