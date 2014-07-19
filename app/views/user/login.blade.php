@extends('shared.layout')

@section('content')
	<div class="center-block header"></div>
	{{ Form::open(array('class'=>'form-horizontal form-login','url' => 'user/login','method'=>'post')) }}
	    <div class="form-group">
	        <div class="pull-left" style="padding-top:4px;width:50px;font-weight: 500; font-size:18px;">
                <strong>登 录</strong>
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
	    </div>
	    <div class="form-group">
	    	{{ Form::password('password',$attributes=array(
	    		'class'=>'form-control',
	    		'placeholder'=>'请输入您的密码',
	    		'required'=>'true'
	    		)); 
    		}}
	    </div>
	    <div class="form-group">
	    	{{ Form::submit('登 录',$attributes=array(
	    		'class'=>'btn btn-danger btn-block'
	    		)); 
    		}}
	    </div>
	    <div class="form-group">
	    	<a class="small" href="{{URL::to('user/register');}}">没有罗莉盒账号?10秒免费注册...</a>
	    </div>
	{{ Form::close() }}
	<div class="center-block footer"></div>
@stop