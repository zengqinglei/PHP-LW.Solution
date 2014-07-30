@extends('shared.layout')

@section('content')
	<div class="center-block header"></div>
	
		{{ Form::open(array('class'=>'form-horizontal form-register','url' => 'user/register','method'=>'post')) }}
		    <div class="form-group">
		        <div class="pull-left" style="padding-top:4px;width:50px;font-weight: 500; font-size:18px;">
	                <strong>注册</strong>
		        </div>
		        <div class="pull-right" style="padding-top:6px;">
		        	<a class="small" href="{{URL::to('spree/p_xrzxlp');}}">注册即送新人专享礼</a>
		        </div>
		    </div>
		    <div class="form-group">
		    	{{ Form::email('usermail', '',$attributes=array(
		    		'class'=>'form-control',
		    		'placeholder'=>'请输入您的邮箱',
		    		'required'=>'true',
		    		'autofocus'=>'true'
		    		)); 
	    		}}
	    		<div class="text-warning">{{ $errors->first('usermail'); }}</div>
		    </div>
		    <div class="form-group">
		    	{{ Form::password('password',$attributes=array(
		    		'class'=>'form-control',
		    		'placeholder'=>'密码长度6-16位,数字和字母组合',
		    		'required'=>'true'
		    		)); 
	    		}}
	    		<div class="text-warning">{{ $errors->first('password'); }}</div>
		    </div>
		    <div class="form-group">
		    	{{ Form::text('validcode','',$attributes=array(
		    		'class'=>'form-control pull-left txt-validcode',
		    		'placeholder'=>'请输入验证码',
		    		'required'=>'true'
		    		)); 
	    		}}
	    		<img class="img-rounded pull-left img-validcode" alt="验证码">
		        <a class="btn btn-default btn-refresh-validcode" href="#">刷新</a>
		        <div class="text-warning">{{ $errors->first('validcode'); }}</div>
		    </div>
		    <div class="form-group">
		    	{{ Form::button('注 册',$attributes=array(
		    		'class'=>'btn btn-danger btn-block',
		    		'type'=>'submit'
		    		)); 
	    		}}
	    		<div class="text-warning">{{ $errors->first('submit_result'); }}</div>
		    </div>
		{{ Form::close() }}
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
