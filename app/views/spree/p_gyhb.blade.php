@extends('shared.layout')

@section('content')
<div class="center-block spree-hdjs">
    <div class="pack-1"></div>
    <div style="padding-top:4px;padding-right:5px;height:30px;">
        <button class="close pull-right" type="button" onclick="goHistory(-1);"><span class="text-red" aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    </div>
    <div class="clearfix">
        <h3 style="float:right;padding:5px;text-align:right; border-bottom:solid 1px #FFBBBC">萝莉盒两岁了！</h3>
    </div>
    <div style="width:250px;margin:auto;">
        <p class="title-1">
            <span class="icon-1"></span>
            <strong>关于领红包</strong>
            <span class="icon-1"></span>
        </p>
        <p class="small" style="margin-top:10px;">
            <ul class="list-unstyled small clearfix" style="height:50px;">
                <li class="pull-left" style="height:100%;width:20px;">
                    1、
                </li>
                <li style="height:100%;">
                    已领取的红包现金可以在萝莉盒网站用来支付所有试用的服务 费、也可以用来支付升级高级定阅会员的费用，但运费除外；
                </li>
            </ul>
        </p>
        <p class="small" style="margin-top:10px;">
            <ul class="list-unstyled small" style="height:70px;">
                <li class="pull-left" style="height:100%;width:20px;">
                    2、
                </li>
                <li style="height:100%;">
                    活动期间获得的现金红包会即时发放到您的萝莉盒网站账户中， 您可以在萝莉盒网站-个人空间-我的账号-我的账户余额中查询 红包的具体情况；
                </li>
            </ul>
        </p>
        <p class="small" style="margin-top:10px;">
            <ul class="list-unstyled small" style="height:30px;">
                <li class="pull-left" style="height:100%;width:20px;">
                    3、
                </li>
                <li style="height:100%;">
                    红包无有效期，只限当前用户使用，不可跨账号使用；
                </li>
            </ul>
        </p>
        <p class="small" style="margin-top:10px;">
            <ul class="list-unstyled small" style="height:30px;">
                <li class="pull-left" style="height:100%;width:20px;">
                    4、
                </li>
                <li style="height:100%;">
                    红包不可以兑换现金，使用红包余额支付的订单不可以获得积 分奖励；
                </li>
            </ul>
        </p>
        <p class="small" style="margin-top:10px;">
            <ul class="list-unstyled small" style="height:30px;">
                <li class="pull-left" style="height:100%;width:20px;">
                    5、
                </li>
                <li style="height:100%;">
                    余额可以与支付宝或其他银联支付方式组合支付；
                </li>
            </ul>
        </p>
        <p class="small" style="margin-top:10px;">
            <ul class="list-unstyled small" style="height:60px;">
                <li class="pull-left" style="height:100%;width:20px;">
                    6、
                </li>
                <li style="height:100%;">
                    使用红包余额支付的订单，如遇退单情况会由客服人员将订单 中的红包余额支付部分退还到用户账户余额中。
                </li>
            </ul>
        </p>
        <p class="small" style="text-align:right;">
            LOLITABOX.COM
        </p>
    </div>
</div>
@stop