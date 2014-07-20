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
	public function getLogin(User $user,$results=null)
	{
		return View::make('user.login',array('model'=>$user))->withErrors($results);
	}
	public function postLogin()
	{
		$data = Input::all();
		$validator = Validator::make(
			$data, 
			array(
				'usermail' => 'required|email',
				'password' => 'required|alpha_num|min:6|max:16'
			),
			array(
				'usermail'=>array(
					'required' => '请填写您的邮箱！',
					'email' => '请填写正确的邮箱！'
				),
				'password'=>array(
					'required' => '请填写您的密码！',
					'alpha_num' => '请填写字母或数字！',
					'min:6' => '密码不能少于6位',
					'max:16' => '密码不能超过16位'
				)
			)
		);
		// 验证通过 passes 失败 fails
		if ($validator->passes()) {
			$usermail=$data['usermail'];
			$password=md5($data['password']);
			$user = DB::select('select * from users where usermail = ? and password = ?',array($usermail,$password));
			if(is_array($user) && count($user)>0){
				
				Auth::attempt(array('usermail' => $usermail, 'password' => $password));
				
				return Redirect::to('/home/index');
			}
			$results = array(
				'submit.error'=>'账户或密码不存在！'
			);
			return $this -> getLogin($results);
		}
		return $this -> getLogin($validator->messages());
	}	
	
	// 客户登出
	public function getLogout(){
		Auth::logout();
		
		return Redirect::to('index.php/user/login');
	}
}
