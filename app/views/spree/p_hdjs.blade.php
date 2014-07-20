@extends('shared.layout')

@section('content')
<div class="center-block spree-hdjs">
	<div class="pack-1"></div>
    <div style="padding-top:4px;padding-right:5px;height:30px;">
        <button class="close pull-right" type="button" onclick="goHistory(-1);"><span class="text-red" aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    </div>
    <div style="margin-top:20px;height:60px;">
    	<h3 style="float:right;padding:5px;text-align:right; border-bottom:solid 1px #FFBBBC">萝莉盒两岁了！</h3>
    </div>
    <p style="width:100%;text-align:center;">
    	<span class="icon-1"></span>
    	<strong>活动介绍</strong>
    	<span class="icon-1"></span>
    </p>
</div>
@stop