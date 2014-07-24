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
            <strong>如何扫描TA的专属二维码？</strong>
            <span class="icon-1"></span>
        </p>
        <p class="small" style="margin-top:10px;">
            <ul class="list-unstyled small" style="height:30px;">
                <li class="pull-left" style="height:100%;width:50px;">
                    方法一：
                </li>
                <li style="height:100%;">                    
                    拿着好友的手机直接微信扫一扫
                </li>
            </ul>
        </p>
        <p class="small" style="margin-top:10px;">
            <ul class="list-unstyled small" style="height:80px;">
                <li class="pull-left" style="height:100%;width:50px;">
                    方法二：
                </li>
                <li style="height:100%;">
                    长按本页面中的二维码图片保持至手机，回到微信“发现”-“扫 一扫”，点击右上角“…”选择“从相册选择二维码”，点中专 属二维码图片即可关注成功。
                </li>
            </ul>
        </p>
        <p class="small" style="text-align:right;">
            LOLITABOX.COM
        </p>
    </div>
</div>
@stop