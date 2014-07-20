<?php

use Illuminate\Support\Facades\Redirect;

use Illuminate\Support\Facades\Auth;

class SpreeController extends BaseController {
	// 大礼包-- 新人专享礼品
	public function getP_XRZXLP(){
		return View::make('spree.p_xrzxlp');
	}
	
	// 大礼包--领红包
	public function getP_LHB(){
		return View::make('spree.p_lhb');
	}
	
	// 大礼包--活动介绍
	public function getP_HDJS(){
		return View::make('spree.p_hdjs');
	}
}
