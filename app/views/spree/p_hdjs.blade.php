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
            <strong>活动介绍</strong>
            <span class="icon-1"></span>
        </p>
        <p class="small" style="margin-top:20px;">
            活动时间：2014年6月1日-7月3日
        </p>
        <p class="small" style="margin-top:20px;">
            活动规则
        </p>
        <p class="small" style="margin-top:10px;">
            <ul class="list-unstyled small clearfix" style="height:50px;">
                <li class="pull-left" style="height:100%;width:20px;">
                    1、
                </li>
                <li style="height:100%;">
                    首次关注萝莉盒官方微信服务号，便可领取1个红包，每个 红包内含5元现金，仅一次有效；
                </li>
            </ul>
        </p>
        <p class="small" style="margin-top:10px;">
            <ul class="list-unstyled small" style="height:70px;">
                <li class="pull-left" style="height:100%;width:20px;">
                    2、
                </li>
                <li style="height:100%;">
                    邀请好友首次关注萝莉盒官方微信服务号，并成功领取红包， 您还可以继续领取1个红包，该红包无数量限制，邀请成功越多 获得红包就会越多。
                </li>
            </ul>
        </p>
        <p class="small text-red">
            温馨提示：
        </p>
        <p class="small">
            点击“领红包”按钮，红包内现金才会打入您的萝莉盒账户中哦~
        </p>
        <div class="clearfix">
            <div class="pull-left" style="width:100px; height:50px;">
                <button type="submit" class="btn btn-danger btn-block">领 红 包</button>
            </div>
            <div class="pull-right" style="width:140px;">
                <button type="submit" class="btn btn-danger btn-block">邀请好友领红包</button>
            </div>
        </div>
        <p class="small" style="text-align:right;">
            LOLITABOX.COM
        </p>
    </div>
</div>
@stop