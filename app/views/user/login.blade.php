@extends('shared.layout')

@section('content')
	<div class="center-block header"></div>
	<form class="form-horizontal form-login" action="/index.php/user/login" method="post">
		<div class="form-group">
	        <div class="pull-left" style="padding-top:4px;width:50px;font-weight: 500; font-size:18px;">
	            登 录
	        </div>
	    </div>
	    <div class="form-group">
	    	<input class="form-control" name="usermail" type="email" placeholder="请输入您的邮箱" required="true" autofocus="true" >
	    </div>
	    <div class="form-group">
	    	<input class="form-control" name="password" type="password" placeholder="请输入您的密码" required="true" >
	    </div>
	    <div class="form-group">
	        <button type="submit" class="btn btn-danger btn-block">登 录</button>
	        <?php echo @$submit_error; ?>
	    </div>
	    <div class="form-group">
	    	<a class="small" href="/index.php/user/register">没有罗莉盒账号?10秒免费注册...</a>
	    </div>
	</form>
	<div class="center-block footer"></div>
@stop