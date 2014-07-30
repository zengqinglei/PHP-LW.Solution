@extends('shared.layout')

@section('content')
<div class="center-block home-index-container">
    <div class="login-info">
        <div style="float:left;width:200px;padding-left:20px;height:30px;line-height:30px;color:#666;">
            <span>欢迎您:</span>
            <span style="max-width:100px;display:inline-block;">{{ Auth::user()->nickname }}</span>
            <a href="{{URL::to('user/logout');}}" class="glyphicon glyphicon-off"></a>
        </div>
        <a href="{{URL::to('spree/p_lhb');}}" style="float:right;width:120px;line-height:30px;text-align:center;display:inline-block;">
            <span>领 红 包</span> <span class="glyphicon glyphicon-gift"></span>
		</a>
    </div>
    <div class="shop-container">
    	@if($page*$rows>1)
    		<a href="{{URL::to('/?page='.($page-1).'&rows='.$rows);}}" class="move-bar bar-left-enable"></a>
    	@else
    		<a class="move-bar bar-left-disable"></a>
    	@endif
    	@if($page*$rows<$total)
    		<a href="{{URL::to('/?page='.($page+1).'&rows='.$rows);}}" class="move-bar bar-right-enable"></a>
    	@else
    		<a class="move-bar bar-right-disable"></a>
    	@endif
        <ul class="list-unstyled shop-list">
        @foreach($products as $product)
        	<li class="pull-left active">
        		@if($product->commend_tag==2)
        			<img src="/Images/rmtj-1.png" alt="热门推荐" style="position:absolute;top:0;left:0; width:70px;height:70px;z-index:1000;" />
        		@endif                
                <a href="{{URL::to('product/details?productid='.$product->pid)}}"><img src="{{ $product->pimg }}" alt="{{ $product->pname }}" style="width:320px;height:260px;" /></a>
                @if($product->if_super==1)
        			<img src="/Images/gjdy-1.png" alt="高级订阅" style="position:absolute;top:206px;right:0; width:54px;height:54px;z-index:1000;" />
        		@endif                
                <a href="{{URL::to('product/details?productid='.$product->pid)}}" style="padding:0 5px;font-size:18px;height:40px;line-height:40px;background-color:#aaa; overflow:hidden;width:320px;display:inline-block;">
                    {{ $product->pname }}
                </a>
                <div style="padding:0 5px;font-size:12px;height:40px;line-height:20px; overflow:hidden;width:auto;">
                    {{ $product->try_viewpoint }}
                </div>
			    <div class="clearfix" style="border-top:solid 1px #ccc;border-bottom:solid 1px #ccc;">
			        <div class="pull-left" style="width:109px;height:30px;line-height:30px;text-align:center; border-right:solid 1px #ccc;">
			        	当前价：￥{{ $product->goodsprice }}
			        </div>
			        <div class="pull-right" style="width:210px;height:30px;line-height:30px;text-align:center;">
			            <span class="text-red">￥8</span> <span>高级订阅会员价</span> ，<a href="#" class="text-danger">立即升级</a>
			        </div>
			    </div>
			    {{ Form::open(array(
			    	'class'=>'form-horizontal form-buy',
			    	'url' => 'order/confirm',
			    	'method'=>'get'
			    	))
			    }}
			    	<input name="productid" type="hidden" value="{{$product->pid}}" >
			        <a href="javascript:void(0);" class="icon-3 btnReduceBuyCount" onclick="reduceBuyCount();"></a>
			        <input class="txtBuyCount" name="buycount" type="text" value="1" inventory="{{$product->inventory}}">
			        <a href="javascript:void(0);" class="icon-4 btnAddBuyCount" onclick="addBuyCount();"></a>
			        <button type="submit" class="btn btn-danger btn-block" style="margin-left:30px;width:120px;display:inline-block;">立即订阅</button>
			    {{ Form::close() }}
			    @foreach($errors->all()as $message)
			    	<div class="text-warning">{{ $message }}</div>
			    @endforeach                
            </li>
        @endforeach            
        </ul>
    </div>
    <div class="vip-info">
        <div style="float:left;width:200px;padding-left:20px;height:40px;line-height:40px;">
            <span>账户余额：￥<span class="lblBalance"></span></span>
            <a class="glyphicon glyphicon-repeat" href="javascript:void(0);" onclick="getBalance('.lblBalance');" style="top:2px;" ></a>
        </div>
        <a class="btnBuy" href="javascript:void(0);" onclick="buySubmit();">
        	结 算
        </a>
    </div>
</div>
@stop

@section('scripts')
<script>
	function reduceBuyCount()
	{
		var txtBuyCount=$('.txtBuyCount');
		var count=parseInt(txtBuyCount.val());
		if(count>1){
			txtBuyCount.val(count-1)
		}else{
			txtBuyCount.val(1)
		}
	}
	function addBuyCount()
	{
		var txtBuyCount=$('.txtBuyCount');
		var inventory=parseInt(txtBuyCount.attr('inventory'));
		var count=parseInt(txtBuyCount.val());
		if(count<inventory||inventory==0){
			txtBuyCount.val(count+1)
		}else{
			txtBuyCount.val(inventory)
		}
	}
	function buySubmit()
	{
		$('.form-buy').submit();
	}
	$(function(){
		getBalance('.lblBalance');
	});
</script>
@stop