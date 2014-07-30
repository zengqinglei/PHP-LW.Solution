@extends('shared.layout')

@section('content')
<div class="center-block order-confirm">
    <div class="top clearfix">
        <div style="float:left;padding-left:10px;width:50px;height:30px;line-height:30px;font-size:20px;">
            <a class="glyphicon glyphicon-arrow-left" href="javascript:void(0);" onclick="goHistory(-1);"></a>
        </div>
        <div class="title-1" style="padding-left:100px;padding-top:2px;height:28px;">
            <span class="icon-1"></span>
            <strong>确认订单</strong>
            <span class="icon-1"></span>
        </div>
    </div>
    {{ Form::open(array(
    	'class'=>'form-horizontal form-order-confirm',
    	'url' => 'order/confirm'
    	))
    }}
    	<input name="pid" type="hidden" value="{{$product->pid}}" />
    	<input name="buycount" type="hidden" value="{{$buy_count}}" />
        <div class="form-group">
            <strong>收货地址</strong>
        </div>
        <div class="form-group">
            <select class="form-control" name="shipping_address" onchange="resetCouriercharges();" required autofocus>
            @foreach($user_addresss as $user_address)
            	<option value="{{$user_address->id}}">
            		{{$user_address->province.' '.$user_address->city.' '.$user_address->district.' '.$user_address->address}}
            	</option>
            @endforeach
            </select>
            <div class="text-warning">{{ $errors->first('shipping_address'); }}</div>
        </div>
        <div class="form-group">
            <strong>快递公司</strong>
        </div>
        <div class="form-group">
            <select class="form-control" name="express" onchange="resetCouriercharges();" required>
                <option value="st">申通快递</option>
                <option value="sf">顺丰快递</option>
            </select>
            <div class="text-warning">{{ $errors->first('express'); }}</div>
        </div>
        <div class="form-group">
            <p><strong>运费：<span class="text-gray">￥<span class="lblCouriercharges"></span>元</span></strong></p>
            <p class="small text-gray">本次订阅的试用品规格为：<span class="lblProductweigth">{{$product->goodssize}}</span>;运费与重量、地区及快递公司有关</p>
        </div>
        <div class="form-group">
            <p><strong>订阅服务费：<span class="text-gray">￥<span class="lblGoodsprice">{{$product->goodsprice*$buy_count}}</span>元</span></strong></p>
            <label class="checkbox-inline text-gray">
                <input name="is_use_balance" type="checkbox" value="true"> 使用账户余额支付订阅服务费 余额：￥<span class="lblBalance"></span>元
            </label>
        </div>
        <div class="form-group">
            <p><strong>实际支付：<span class="text-red">￥<span class="lblPayables">60.00</span>元</span></strong></p>
        </div>
        <div class="form-group">
            <strong>支付方式</strong>
        </div>
        <div class="form-group">
            <select class="form-control" name="payment" required>
                <option value="zfb">支付宝支付</option>
                <option value="wx">微信支付</option>
            </select>
            <div class="text-warning">{{ $errors->first('payment'); }}</div>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-danger btn-block">提交订单</button>
            <div class="text-warning"><?php echo @$submit_result; ?></div>
        </div>
    {{ Form::close() }}
</div>
@stop

@section('scripts')
<script>
	function resetCouriercharges(){
		var form=$('.form-order-confirm');
		var province=form.find('[name="shipping_address"] option:selected').text().split(' ')[0];
		var express=form.find('[name="express"]').val();
		var weight=0.1;
		var lblPayables=form.find('.lblPayables').text('...');
		postCouriercharges('.lblCouriercharges',province,express,weight,function(couriercharges){
			var cbIsusebalance=form.find('[name="is_use_balance"]');
			var goodsprice=parseInt(form.find('.lblGoodsprice').text());
			couriercharges=parseInt(couriercharges);
			var balance=0;
			if(cbIsusebalance.attr('checked')){
				balance=parseInt(form.find('.lblBalance').text());
			}
			lblPayables.text(goodsprice+couriercharges-balance);
		});
	}
	$(function(){
		getBalance('.lblBalance',function(balance){
			var form=$('.form-order-confirm');
			var cbIsusebalance=form.find('[name="is_use_balance"]');
			if(balance == 0){
				cbIsusebalance.removeAttr('checked').attr('disabled','disabled');
			}else{
				cbIsusebalance.removeAttr('disabled');
			}
		});
		resetCouriercharges();
	});
</script>
@stop