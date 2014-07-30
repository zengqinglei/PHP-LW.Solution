@extends('shared.layout')

@section('content')
<div class="center-block product-details">
    <div class="top clearfix">
        <div style="float:left;padding-left:10px;width:50px;height:30px;line-height:30px;font-size:20px;">
            <a class="glyphicon glyphicon-arrow-left" href="javascript:void(0);" onclick="goHistory(-1);"></a>
        </div>
        <div class="title-1" style="padding-left:100px;padding-top:2px;height:28px;">
            <span class="icon-1"></span>
            <strong>产品信息</strong>
            <span class="icon-1"></span>
        </div>
    </div>
    <div class="content-row">
        <h4 style="overflow:hidden;">{{ $product->pname }}</h4>
        <p class="small">市场参考价：<span class="text-gray">￥{{ $product->goodsprice }}</span></p>
        <p class="small">正装规格：<span class="text-gray">{{ $product->goodssize }}</span></p>
        <p class="small">功效：<span class="text-gray">{{ $product->try_viewpoint }}</span></p>
    </div>
    <div class="content-other-row">
        <ul class="list-unstyled clearfix" onclick="expandDetails(this);">
            <li class="icon icon-5"></li>
            <li class="title">产品介绍</li>
            <li class="icon icon-8"></li>
        </ul>
        <div class="details">
        	{{ $product->pintro }}
        </div>
    </div>
    <div class="content-other-row" >
        <ul class="list-unstyled clearfix" onclick="expandDetails(this);">
            <li class="icon icon-6"></li>
            <li class="title">使用方法</li>
            <li class="icon icon-8"></li>
        </ul>
        <div class="details">
        	{{ $product->readme }}
        </div>
    </div>
    <div class="content-other-row">
        <ul class="list-unstyled clearfix" onclick="expandDetails(this);">
            <li class="icon icon-7"></li>
            <li class="title">试用分享</li>
            <li class="icon icon-8"></li>
        </ul>
        <div class="details">
        	{{ $product->try_viewpoint }}
        </div>
    </div>
</div>
@stop

@section('scripts')
<script>
	function expandDetails(node)
	{
		$(node).parent()
			.siblings()
			.find('.details:visible')
			.prev('ul')
			.find('li:last')
			.removeClass('icon-9')
		   	.addClass('icon-8')
		   	.parent()
		   	.next('.details')
		   	.toggle();
		if($(node).next('.details').is(':visible'))
		{
			$(node).find('li:last()')
				.removeClass('icon-9')
				.addClass('icon-8');
		}
		else
		{
			$(node).find('li:last()')
				.removeClass('icon-8')
				.addClass('icon-9');
		}
		$(node).next('.details').toggle('fast');
	}
</script>
@stop