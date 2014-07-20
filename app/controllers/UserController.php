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
	public function getLogin($validator=null)
	{
		return View::make('user.login')->withErrors($validator);
	}
	public function postLogin()
	{
		$data = Input::all();
		$rules = array(
			'usermail' => 'alpha_num',
			'password'=>'alpha_num'
		);
		$validator = Validator::make($data, $rules);
		return var_dump($validator->messages());
		// 验证通过 passes 失败 fails
		if ($validator->fails()) {
			$user = DB::select('select * from users where usermail = ? and password = ?',array($data['usermail'],md5($data['password'])));
			if(is_array($user) && count($user)>0){
				return Redirect::to('/home/index');
			}
			return getLogin(array('submit.error'=>'账户或密码不存在！'));
		}
		return getLogin($validator);
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
