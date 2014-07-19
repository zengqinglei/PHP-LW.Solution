@extends('shared.layout')

@section('content')
	<div class="center-block header"></div>
	<form class="form-horizontal form-register" action="/index.php/user/register" method="post">
		<div class="form-group">
	        <div class="pull-left" style="padding-top:4px;width:50px;font-weight: 500; font-size:18px;">
	            注 册
	        </div>
	        <div class="pull-right" style="padding-top:6px;">
	        	<a class="small" href="/index.php/promotions/p_xrzxlp">注册即送新人专享礼</a>
	        </div>
	    </div>
	    <div class="form-group">
	    	<input class="form-control" name="usermail" type="email" placeholder="请输入您的邮箱" required="true" autofocus="true" >
	    </div>
	    <div class="form-group">
	    	<input class="form-control" name="password" type="password" placeholder="请输入您的密码" required="true" >
	    </div>
	    <div class="form-group">
	    	<input class="form-control pull-left txt-validcode" name="validcode" type="text" placeholder="请输入验证码" required="true" >
	        <img class="img-rounded pull-left img-validcode" alt="验证码">
	        <a class="btn btn-default btn-refresh-validcode" href="#">刷新</a>
	    </div>
	    <div class="form-group">
	        <button type="submit" class="btn btn-danger btn-block">注 册</button>
	    </div>
	</form>	
	<div class="center-block footer"></div>
@stop

@section('scripts')
	<script>
	    $(function () {
	        $('.btn-refresh-validcode').click(function () {
	            refreshValidCode($('.img-validcode'))
	        }).click();
	    });
	</script>
@stop
