<?php

use Illuminate\Support\Facades\Redirect;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SpreeController extends BaseController {
	// 大礼包-- 新人专享礼品
	public function getP_XRZXLP(){
		return View::make('spree.p_xrzxlp');
	}
	
	// 大礼包--领红包
	public function getP_LHB(){
		return View::make('spree.p_lhb');
	}
	public function postP_LHB(){
		//设置红包礼金
		$money_array = array(1,5,10,20,50);
		$k = array_rand($money_array,1);
		$rand_money = $money_array[$k];
		
		Session::put('userid','45292');
		$user_id = Session::get('userid');
		
		$returndata = array();
		$returndata['success'] = '0';
		$returndata['msg'] = '';
		
		if( intval($user_id) > 0  ){
			$gifttype = Input::get('action');
			
			//获得用户的领取次数
			$s_query = DB::select("select count(*) as num from `user_activity` where `userid` = ? and `activitytype` = ? and `gifttype` = ? ", 
			array($user_id,'萝莉盒2周年庆',$gifttype));
			$n = $s_query[0]->num;

			if( $n >= 1 ){
				$returndata['msg'] = '您已经参与 ' . $n .'次 活动,重新获得领取资格后才能继续参与！';
				$returndata['num'] = $n;
			}else{
				$where = "insert into `user_activity` (`userid`, `activitytype`, `gifttype`,`giftinfo`,`addtime`) value (?,?,?,?,?) ";
				$data = array($user_id,'萝莉盒2周年庆',$gifttype,$rand_money,date('Y-m-d H:i:s',time()) );
				
				$results = DB::insert($where, $data);
				if( $results ){
					$returndata['success'] = '1';
					$returndata['msg'] = '恭喜您，成功领取' . $rand_money . '元';
					$returndata['num'] = 1;
				}else{
					$returndata['msg'] = '服务器异常！';
					$returndata['num'] = 0;
				}
			}
		}else{
			$returndata['msg'] = '未登录，无法领取红包！';
			$returndata['num'] = 0;
		}
		return json_encode($returndata);	
	}
	
	
	// 大礼包--活动介绍
	public function getP_HDJS(){
		return View::make('spree.p_hdjs');
	}
	
	// 大礼包--关于红包
	public function getP_GYHB(){
		return View::make('spree.p_gyhb');
	}
	
	// 大礼包--红包记录
	public function getP_HBJL(){
		return View::make('spree.p_hbjl');
	}
	
	// 大礼包--如何领红包
	public function getP_RHLHB(){
		return View::make('spree.p_rhlhb');
	}
	
	// 大礼包--如何扫描二维码
	public function getP_RHSM2WM(){
		return View::make('spree.p_rhsm2wm');
	}

	// 大礼包--邀请好友领红包
	public function getP_YQHYLHB(){
		return View::make('spree.p_yqhylhb');
	}

	// 大礼包--邀请好友领红包2
	public function getP_YQHYLHB2(){
		return View::make('spree.p_yqhylhb2');
	}
}
