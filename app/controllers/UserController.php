<?php

use Illuminate\Support\Facades\Redirect;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends BaseController {
	// 客户注册
	public function getRegister(){
		return View::make('user.register');
	}
	public function postRegister(){	
		$data = Input::all();
		$validation = Validator::make($data, array(
				'usermail' => 'required|email|unique:users',
				'password' => 'required|alpha_num|min:6|max:16',
				'validcode' => 'required|numeric|in:'.Session::get('ValidCode')
		));
		if ($validation->fails()) {
			return Redirect::back()->withErrors($validation)->withInput();
		}
		
		$user = new User;		
		$user->usermail = $data['usermail'];
		$user->nickname=substr($data['usermail'],0,strpos($data['usermail'],'@')) . mt_rand(1,9999);
		$user->addtime=date('Y-m-d H:i:s',time());
		$user->save();
		return Redirect::to('user/login');
	}
	
	// 客户登录
	public function getLogin()
	{
		return View::make('user.login');
	}
	public function postLogin()
	{
		$data=Input::all();
		$validation = Validator::make($data, array(
			'usermail' => 'required|email|exists:users',
			'password' => 'required|alpha_num|min:6|max:16'
		));
		if ($validation->fails()) {
			return Redirect::back()->withErrors($validation)->withInput();
		}
		if(!Auth::attempt(array('usermail'=>$data['usermail'],'password'=>$data['password'])))
		{
			return View::make('user.login')->with('submit_result', '登录失败！');
		}
		return Redirect::to('/');
	}	
	
	// 客户登出
	public function getLogout(){
		Auth::logout();
		
		return Redirect::to('user/login');
	}
}
