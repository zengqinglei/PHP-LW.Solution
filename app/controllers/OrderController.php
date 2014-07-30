<?php

use Illuminate\Support\Facades\Redirect;

class OrderController extends BaseController {
	// 确认订单
	public function getConfirm(){
		$data = array(
			'pid' => Input::get('productid'),
			'buy_count' => Input::get('buycount')
		);
		$validation = Validator::make($data, array(
			'pid' => 'required|numeric|exists:products',
			'buy_count' => 'required|numeric|min:1'
		));
		if ($validation->fails()) {
			return Redirect::back()->withErrors($validation)->withInput();
		}
		$user_addresss = User_address::whereRaw('userid = ? and if_del = ? ',array(Auth::user()->userid,0))->orderBy('if_active','desc')->get();
		if(count($user_addresss)==0)
		{
			$backurl=urlencode('order/confirm?productid='.$data['pid'].'&buycount='.$data['buy_count']);
			
			return Redirect::to('shipping/add?backurl='.$backurl);
		}
		$product=Product::find($data['pid']);
		
		return View::make('order.confirm')->with('product',$product)->with('buy_count',$data['buy_count'])->with('user_addresss',$user_addresss);
	}
	public function postConfirm(){
		// 获取所有数据
		$data = Input::all();
		
		// 验证规则
		$validation = Validator::make($data, array(
			'pid' => 'required|numeric|exists:products',
			'buycount' => 'required|numeric|min:1',
			'shipping_address' => 'required|exists:user_address,id',
			'express' => 'required',
			'payment' => 'required'
		));
		if ($validation->fails()) {
			return Redirect::back()->withErrors($validation)->withInput();
		}
		
		// 组织所需数据
		$product = Product::find($data['pid']);
		$box_product = Box_product::where('pid','=',$product->pid);
		$box = Box::find($box_product->boxid);
		$user_addresss = User_address::find($data['shipping_address']);
		
		// 是否使用账户余额
		$balance = 0;
		if($data['is_use_balance']){
			$balance = $service->getBalance();
		}
		
		// 新增订单
		$user_order = new User_order();
		list($usec, $sec) = explode(" ", microtime());
		$time = ((float)$usec + (float)$sec);
		list($usec, $sec) = explode(".", $time);
		$date = date('YmdHisx',$usec);
		$user_order->ordernmb = str_replace('x', $sec, $date);
		$user_order->pay_bank = $data['payment'];
		$user_order->userid = Auth::user()->userid;
		$user_order->boxid = $box_product->boxid;
		$user_order->boxprice = $box->box_price;
		$user_order->expressprice = $service->postCouriercharges($user_addresss->province, $data['express'], 0.1);
		$user_order->expresstype = $data['express'];
		$user_order->expresswidght = '0.00';
		$user_order->type = $box->category;
		$user_order->addtime = date('Y-m-d H:i:s',time());
		$user_order->discount = 0;// 根据会员类型计算折扣价格
		$user_order->giftcard = $balance;
		$user_order->ifavalid = 1;
		$user_order->address_id = $user_addresss->id;
		$user_order->save();
		
		// 新增订单发送信息
		$user_order_send = new User_order_send();
		$user_order_send->orderid = $user_order->ordernmb;
		$user_order_send->boxid = $box_product->boxid;
		$user_order_send->boxtype = $box->category;
		$user_order_send->userid = Auth::user()->userid;
		$user_order_send->productnum = $data['buycount'];
		$user_order_send->productprice =$product->goodssprice*$user_order_send->productnum+$user_order->expressprice-$balance;
		$user_order_send->save();
		
		// 新增订单送货地址
		$user_order_address = new User_order_address();
		$user_order_address->orderid = $user_order->ordernmb;
		$user_order_address->linkman = $user_address->linkman;
		$user_order_address->telphone = $user_address->telphone;
		$user_order_address->province = $user_address->province;
		$user_order_address->city = $user_address->city;
		$user_order_address->district = $user_address->district;
		$user_order_address->address = $user_addresss->address;
		$user_order_address->postcode = $user_addresss->postcode;
		$user_order_address->save();
		
		// 成功后跳转确认支付界面
		return Redirect::to('order/submit?orderid='.$user_order->ordernmb);
		
		// 将以上信息存到user_order(订单记录),user_order_address(配送地址),user_order_send_proxy(发货信息),user_order_proxy(物流信息)
	}
	
	// 订单详情
	public function getDetails()
	{
		return View::make('order.details');
	}
	
	// 订单列表
	public function getList()
	{
		return View::make('order.list');
	}
	
	// 订单提交
	public function getSubmit()
	{
		return View::make('order.submit');
	}
	public function postSubmit()
	{
		return null;
	}
}