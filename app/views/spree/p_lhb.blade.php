@extends('shared.layout')

@section('content')
<div class="center-block spree-lhb">
	<h4 style="text-align:center;">萝莉盒两岁了，快来领红包！</h4>
	<p style="margin-top:20px;text-align:center;color:#fe0000;">目前萝莉盒以送出<span class="text-muted">￥1000</span>元红包</p>
	<h4 style="margin-top:20px;text-align:center;">您可以领取<strong style="color:#fe0000;"> 10 </strong> 个红包</h4>
	<p style="width:250px;margin:20px auto;">
		<button type="submit" class="btn btn-danger btn-block btn-lg">领 红 包</button>
	</p>
	<p style="text-align:center;"><a href="#">活动介绍</a>        <span>｜</span>         <a href="#">关于红包</a></p>
	<div class="xct-1"></div>
	<div class="vip-info">
		<div style="float:left;width:200px;padding-left:20px;heigth:40px;line-height:40px;">
			账户余额：￥1000
		</div>
		<a style="float:right;width:120px;line-height:40px;background-color:#DC1570;text-align:center;display:inline-block;">
			立即订阅
		</a>
	</div>
</div>
@stop