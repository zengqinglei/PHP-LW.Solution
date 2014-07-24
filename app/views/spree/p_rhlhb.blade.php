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
            <strong>如何领红包</strong>
            <span class="icon-1"></span>
        </p>
        <p class="small" style="margin-top:10px;">
            <ul class="list-unstyled small clearfix" style="height:50px;">
                <li class="pull-left" style="height:100%;width:40px;">
                    Step1: 
                </li>
                <li style="height:100%;">
                    扫描二维码关注萝莉盒微信官方服务号；
                </li>
            </ul>
        </p>
        <p class="small" style="margin-top:10px;">
            <ul class="list-unstyled small" style="height:70px;">
                <li class="pull-left" style="height:100%;width:40px;">
                    Step2: 
                </li>
                <li style="height:100%;">
                    点击“领红包”成功领取红包现金后，您还可以邀请好友 参加“萝莉盒两岁啦，快来领红包!”活动，您和好友都可以再领 取红包；
                </li>
            </ul>
        </p>
        <p class="small" style="margin-top:10px;">
            <ul class="list-unstyled small" style="height:70px;">
                <li class="pull-left" style="height:100%;width:40px;">
                    Step3: 
                </li>
                <li style="height:100%;">
                    您可以多多邀请好友来参加，红包无最高数量限制，邀请 越多获得红包就会越多。
                </li>
            </ul>
        </p>
        <p class="small" style="text-align:right;">
            LOLITABOX.COM
        </p>
    </div>
</div>
@stop