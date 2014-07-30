<?php

class ServiceController extends BaseController {
	// 生成验证码
	public function getValidCode(){
	    Header("Content-type: image/PNG");
	    $im = imagecreate(44,18); // 画一张指定宽高的图片
	    $back = ImageColorAllocate($im, 245,245,245); // 定义背景颜色
	    imagefill($im,0,0,$back); //把背景颜色填充到刚刚画出来的图片中
	    $vcodes = "";
	    srand((double)microtime()*1000000);
	    //生成4位数字
	    for($i=0;$i<4;$i++){
	    $font = ImageColorAllocate($im,mt_rand(0,100),mt_rand(0,150),mt_rand(0,200)); // 生成随机颜色
	    $authnum=rand(1,9);
	    $vcodes.=$authnum;
	    imagestring($im, 5, 2+$i*10, 1, $authnum, $font);
	    }
		Session::put('ValidCode',$vcodes);
		
	    for($i=0;$i<100;$i++) //加入干扰象素
	    {
	    $randcolor = ImageColorallocate($im,rand(0,255),rand(0,255),rand(0,255));
	    imagesetpixel($im, rand()%70 , rand()%30 , $randcolor); // 画像素点函数
	    }
	    return ImagePNG($im);
	    //ImageDestroy($im);
	}
	
	// 获取地区子级列表
	public function getAreaChilds(){
		$childs=Area::whereRaw('pid = ? and status = 1',array(Input::get('parentid')))->get();
		
		return json_encode($childs);
	}
	
	// 获取账户余额
	public function getBalance(){
		$money_add = Giftcard::where('userid','=',Auth::user()->userid)->sum('price');
		$money_reduce = User_order::whereRaw('userid = ? and giftcard>0 and state=1 and ifavalid=1 ',array(Auth::user()->userid))->sum('giftcard');
		$balance=$money_add-$money_reduce;
		
		return $balance;
	}
	
	// 计算快递运费
	public function postCouriercharges($province,$express,$weight) {		
		switch ($express) {
			case "st": //申通快递
				if(preg_match('/新疆|西藏/', $province))  {
					$startship=20; //首重计费
					$goonship=18; //续重
				}
				else {
					$startship=8; //首重计费
					$goonship=5; //续重
				}
				break;
			case "sf": //顺风快递
				if(preg_match('/新疆|西藏/', $province))  {
					$startship=24; //首重计费
					$goonship=20; //续重
				}else if(preg_match('/北京|天津|河北/', $province)){
					$startship=15; //首重计费
					$goonship=5; //续重
				}else if(preg_match('/广西|广东|海南|内蒙古/', $province)){
					$startship=22; //首重计费
					$goonship=14; //续重
				}else{
					$startship=22; //首重计费
					$goonship=10; //续重
				}
				break;
		}
		if($weight>1) {
			$weight_goon=$weight-1;
			$weight_goon_sum=ceil($weight_goon/1)*$goonship;
			return $startship+$weight_goon_sum;
		}
		else {
			return $startship;
		}
	}
	
	// 格式化时间戳，精确到毫秒，x代表毫秒
	function microtime_format($tag, $time){
		list($usec, $sec) = explode(".", $time);
		$date = date($tag,$usec);
		return str_replace('x', $sec, $date);
	}
	
	// 获取当前时间戳，精确到毫秒
	function microtime_float(){
		list($usec, $sec) = explode(" ", microtime());
		return ((float)$usec + (float)$sec);
	}
}
