<?php

use Illuminate\Http\Request;

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
		$gifttype=Input::get('gifttype');
		$lhb_times=User_activity::whereRaw(
			'userid = ? and activitytype = ? and gifttype = ? ',
			array(Auth::user()->userid,'萝莉盒2周年庆',$gifttype)
		)->count();
		if($lhb_times > 0){
			return View::make('spree.p_lhb')->with(
				'submit_result',
				'您已经领取过红包了，您可以<a href="'.URL::to('spree/p_yqhylhb').'">邀请好友</a>继续领红包！');
		}
		
		//设置红包礼金
		$money_array = array(1,5,10,20,50);
		$k = array_rand($money_array,1);
		$rand_money = $money_array[$k];
		
		$lhb=new User_activity;
		$lhb->userid=Auth::user()->userid;
		$lhb->activitytype='萝莉盒2周年庆';
		$lhb->gifttype=$gifttype;
		$lhb->giftinfo=$rand_money;
		$lhb->addtime=date('Y-m-d H:i:s',time());
		$lhb->save();
		
		return Redirect::to('spree/p_yqhylhb?id='.$lhb->id);
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
		$hbjl=User_activity::whereRaw(
			'userid = ? and gifttype = ?',
			array(Auth::user()->userid,'spree')
		)->orderBy('addtime','desc')->get();
		
		return View::make('spree.p_hbjl')->with('hbjl',$hbjl);
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
		$lhb=User_activity::find(Input::get('id'));
		
		return View::make('spree.p_yqhylhb')->with('lhb',$lhb);
	}

	// 大礼包--邀请好友领红包2
	public function getP_YQHYLHB2(){
		return View::make('spree.p_yqhylhb2');
	}
}
