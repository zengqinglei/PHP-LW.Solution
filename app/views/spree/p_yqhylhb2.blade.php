@extends('shared.layout')

@section('content')
<div class="center-block spree-yqhylhb">
    <div class="pack-1"></div>
    <div class="clearfix">
        <h3 style="float:right;padding:5px 30px;text-align:right; border-bottom:solid 1px #FFBBBC">
            <strong>萝莉盒两岁了！</strong>
        </h3>
    </div>
    <div style="width:250px;margin:auto;">
        <p>您的好友 <span style="color:#aaa;">马大小</span> 邀您一起领红包！</p>
        <p class="small">扫描下方专属二维码，首次关注萝莉盒微信官方服务号，您就可以 领取1个红包（7月31日23：59前有效）。</p>
        <p style="margin-top:10px;text-align:center;">
            <img src="/Images/icon-ewm.png" alt="扫描二维码" style="width:134px;height:115px;" />
        </p>
        <p class="small" style="margin-top:10px;text-align:center;">
            <a href="{{URL::to('spree/p_rhlhb');}}">领取红包？</a>
            <span>｜</span>
            <a href="{{URL::to('spree/p_rhsm2wm');}}">扫描二维码？</a>
            <span>｜</span>
            <a href="{{URL::to('spree/p_gyhb');}}">关于红包</a>          
        </p>
        <p class="small" style="padding-bottom:10px;text-align:right;">
            LOLITABOX.COM
        </p>
    </div>
</div>
@stop