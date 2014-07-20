@extends('shared.layout')

@section('content')
<div class="center-block spree-xrzxlp">
    <div style="padding-top:4px;padding-right:5px;height:30px;">
        <button class="close pull-right" type="button" onclick="goHistory(-1);"><span class="text-red" aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    </div>
    <div class="center-block header"></div>
    <div class="center-block" style="width:250px;">
        <h3>注册即送新人专享礼</h3>
        <p class="small" style="line-height:25px;">现在起注册萝莉盒网站就可以获得小萝仆特别为您准备的新人限 时二重礼：免费产品+新人专享神秘盒，想要了解具体详情，还 请登录萝莉盒网站，在我的订阅中进行查询~ </p>
        <p class="small" style="line-height:25px;"><span class="text-red">特别提醒</span>：主人，您一定要记得在<span class="text-red">7天内</span>把二重礼拿走哦，不然 就享受不到啦~</p>
    </div>
    <div class="center-block footer"></div>
</div>
@stop