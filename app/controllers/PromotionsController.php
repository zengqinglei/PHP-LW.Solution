<?php

use Illuminate\Support\Facades\Redirect;

use Illuminate\Support\Facades\Auth;

class PromotionsController extends BaseController {
	// 促销 新人专享礼品
	public function getP_XRZXLP(){
		return View::make('promotions.p_xrzxlp');
	}
}
