<?php

class HomeController extends BaseController {
	public function getIndex()
	{
		$page = Input::get('page');
		$rows = Input::get('rows');
		if(is_null($page))
		{
			$page = 1;
		}
		if(is_null($rows))
		{
			$rows = 1;
		}
		$query=Product::where('status','=',1)->orderBy('sort_num','desc')->skip(($page-1)*$rows)->take($rows);
		$total=$query->count();
		$products=$query->get();
		
		return View::make('home.index')->with('page',$page)->with('rows',$rows)->with('total',$total)->with('products',$products);
	}
}