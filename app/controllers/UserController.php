<?php

use Illuminate\Support\Facades\Redirect;

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
	public function postLogin($usermail)
	{
		return $usermail;
		$rules = array(
				'usermail' => 'alpha_num'
		);
		if ($validator->passes()) {
			// Normally we would do something with the data.
			return Redirect::to('user/register');
		}
		return Redirect::to('/')->withErrors($validator);
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
