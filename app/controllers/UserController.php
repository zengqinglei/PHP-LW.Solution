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
				'usermail' => 'required|email',
				'password' => 'required|alpha_num|min:6|max:16'
		));
		if ($validation->fails()) {
			return Redirect::back()->withErrors($validation)->withInput();
		}
		
		$user = DB::select('select * from users where usermail = ?', array($data['usermail']));
		if( !empty($user) ){
			return View::make('user.register')->with('submit_result', '邮箱已存在！');
		}
		//执行插入
		$where = "insert into `users` (`nickname`, `usermail`, `password`,`state`,`addtime`) value (?,?,?,?,?) ";
		$nickname = substr($data['usermail'],0,strpos($data['usermail'],'@')) . mt_rand(1,9999);
		$add_query = DB::insert($where, array($nickname,$data['usermail'],md5($data['password']),'1',date('Y-m-d H:i:s',time()) ));
		if(!$add_query){
			return View::make('user.register')->with('submit_result', '服务器异常，注册失败！');
		}
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
			'usermail' => 'required|email',
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
