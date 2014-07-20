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
		$post_param = Input::all();
		
		if( !empty($post_param) ){
			$username = $post_param['usermail'];
			$pwd = $post_param['password'];
			
			//$pattern = '/^(?![0-9]+$)(?![a-zA-Z]+$)[0-9A-Za-z]{6,16}$/';
			if( empty($pwd) || strlen($pwd)<6 || strlen($pwd) > 16 ){
				return Redirect::to('user/register')->with('pwd_format', '密码格式错误！');
			}else {
				$pwd = md5($pwd);
			}
			
			//判断用户是否存在
			$user_exist = DB::select('select * from users where usermail = ?', array($username));
			
			if( empty($user_exist) ){
				//执行插入
				$where = "insert into `users` (`nickname`, `usermail`, `password`,`state`,`addtime`) value (?,?,?,?,?) ";
				$nickname = substr($username,0,strpos($username,'@')) . mt_rand(1,9999);
				$data = array($nickname,$username,$pwd,'1',date('Y-m-d H:i:s',time()) );
				
				$add_query = DB::insert($where, $data);
				
				if($add_query){
					return Redirect::to('user/login');
				}else{
					return Redirect::to('user/register')->with('message', '服务器异常，注册失败！');
				}

			}else{
				return Redirect::to('user/register')->with('message', '用户以存在！');
			}
		}
	}
	
	// 客户登录
	public function getLogin()
	{
		return View::make('user.login');
	}
	public function postLogin()
	{
		return '1';
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
