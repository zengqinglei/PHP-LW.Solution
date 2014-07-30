@extends('shared.layout')

@section('content')
<div class="center-block order-submit">
    <div class="top clearfix">
        <div style="float:left;padding-left:10px;width:50px;height:30px;line-height:30px;font-size:20px;">
            <a class="glyphicon glyphicon-arrow-left"></a>
        </div>
        <div class="title-1" style="padding-left:100px;padding-top:2px;height:28px;">
            <span class="icon-1"></span>
            <strong>确认订单</strong>
            <span class="icon-1"></span>
        </div>
    </div>
    <div style="padding:10px;">
        <div class="form-group" style="border-bottom:solid 1px #eee;">
            <dl class="dl-horizontal">
                <dt style="width:80px;font-weight:100;">订单编号：</dt>
                <dd class="text-gray" style="margin-left:80px;">111111111111111111111111</dd>
            </dl>
            <dl class="dl-horizontal">
                <dt style="width:80px;font-weight:100;">订单时间：</dt>
                <dd class="text-gray" style="margin-left:80px;">2014-05-20</dd>
            </dl>
            <dl class="dl-horizontal">
                <dt style="width:80px;font-weight:100;">收货信息：</dt>
                <dd class="text-gray" style="margin-left:80px;">
                    <div>张三、15827108980</div>
                    <div>北京市朝阳区劲松东三环路东侧 北京工业大学北面</div>
                </dd>
            </dl>
            <dl class="dl-horizontal">
                <dt style="width:80px;font-weight:100;">付款金额：</dt>
                <dd class="text-red" style="margin-left:80px;">￥43.00</dd>
            </dl>
            <dl class="dl-horizontal">
                <dt style="width:80px;font-weight:100;">支付方式：</dt>
                <dd class="text-gray" style="margin-left:80px;">支付宝0</dd>
            </dl>
        </div>
        <div class="form-group" style="border-bottom:solid 1px #eee;">
            <dl class="dl-horizontal">
                <dt style="width:80px;font-weight:100;">快递单号：</dt>
                <dd class="text-gray" style="margin-left:80px;">111111111111111（申通快递）</dd>
            </dl>
            <dl class="dl-horizontal">
                <dt style="width:80px;font-weight:100;">物流跟踪：</dt>
                <dd class="text-gray" style="margin-left:80px;">
                    <div style="word-break:break-all;">
                        1111111111111111111111111111111111111111
                    </div>
                    <div style="word-break:break-all;">
                        2222222222222222222222222222222222222222
                    </div>
                </dd>
            </dl>
        </div>
    </div>
</div>
@stop