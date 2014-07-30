<?php

class ProductController extends BaseController {
	// 产品详情
	public function getDetails()
	{
		$product=Product::find(Input::get('productid'));
		
		return View::make('product.details')->with('product',$product);
	}
}