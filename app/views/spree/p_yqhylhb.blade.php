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
        <p class="small" style="margin-top:20px;text-align:center;color:#fe0000;">
            1个红包不过瘾，立即邀请好友领取红包，您将获得更多
        </p>
        <p style="text-align:center;">
            <a href="#" style="width:51px;height:50px;background:transparent url(/Content/Images/icon-2.png) no-repeat center center;display:inline-block;"></a>
        </p>
        <p style="width:250px;margin:20px auto;">
            <button type="submit" class="btn btn-danger btn-block">邀 请 好 友 领 红 包</button>
        </p>
        <p style="border-bottom:solid 1px #000;">
            <strong>您的好友将收到如下邀请：</strong>
        </p>
        <p>您的好友 <span style="color:#aaa;">马大小</span> 邀您一起领红包！</p>
        <p>扫描下方专属二维码，首次关注萝莉盒微信官方服务号，您就可以 领取1个红包（7月31日23：59前有效）。</p>
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