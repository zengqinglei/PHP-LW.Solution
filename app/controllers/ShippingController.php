<?php

class ShippingController extends BaseController {
	// 收获地址 新增 视图
	public function getAdd()
	{
		$backurl=Input::get('backurl');
		
		return View::make('shipping.add')->with('backurl',$backurl);
	}
	// 收获地址 新增
	public function postAdd()
	{
		$data = Input::all();
		$validation = Validator::make($data, array(
			'linkman' => 'required',
			'telphone' => 'required|numeric',
			'province' => 'required',
			'city' => 'required',
			'district' => 'required',
			'address' => 'required',
			'postcode' => 'required|numeric',
			'if_active' => 'required'
		));
		if ($validation->fails()) {
			return Redirect::back()->withErrors($validation)->withInput();
		}
		$user_address=new User_address();
		$user_address->userid=Auth::user()->userid;
		$user_address->linkman=$data['linkman'];
		$user_address->telphone=$data['telphone'];
		$user_address->province = Area::find($data['province'])->title;
		$user_address->city = Area::find($data['city'])->title;
		$user_address->district = Area::find($data['district'])->title;
		$user_address->address=$data['address'];
		$user_address->postcode=$data['postcode'];
		$user_address->if_active=$data['if_active'];
		$user_address->addtime=date('Y-m-d H:i:s',time());
		$user_address->save();
		
		if(empty($data['backurl']))
		{
			return Redirect::to('/');
		}
		else
		{
			return Redirect::to($data['backurl']);
		}
	}
}