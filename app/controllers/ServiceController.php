<?php

class ServiceController extends BaseController {
	public function getValidCode()
	{
	    //生成验证码图片
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
}
