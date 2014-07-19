<?php

use Illuminate\Support\Facades\Auth;

class UserController extends BaseController {
	// 客户注册
	public function getRegister(){
		return View::make('user.register');
	}
	public function postRegister($usermail,$password,$validcode){
		
	}
	
	// 客户登录
	public function getLogin()
	{
		return View::make('user.login');
	}
	public function postLogin($usermail,$passowrd)
	{
		if (Auth::attempt(array('usermail' => $usermail, 'password' => $password)))
		{
			return Redirect::to('index.php/home/index');
		}
	}	
	
	// 客户登出
	public function getLogout(){
		Auth::logout();
		
		return Redirect::to('index.php/user/login');
	}
}
