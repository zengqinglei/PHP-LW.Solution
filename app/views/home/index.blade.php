@extends('shared.layout')

@section('content')
<div class="center-block home-index-container">
    <div class="login-info">
        <div style="float:left;width:200px;padding-left:20px;height:30px;line-height:30px;">
            <span class="glyphicon glyphicon-user"></span> <span>欢迎您：</span><span>{{ Auth::user()->nickname }}</span>
        </div>
        <a href="{{URL::to('spree/p_lhb');}}" style="float:right;width:120px;line-height:30px;text-align:center;display:inline-block;">
            <span>领 红 包</span> <span class="glyphicon glyphicon-gift"></span>
		</a>
    </div>
    <div class="shop-container">
        <a href="#" class="move-bar bar-left-enable"></a>
        <a href="#" class="move-bar bar-right-enable"></a>
        <ul class="list-unstyled shop-list">
            <li class="pull-left active">
                <img src="/Images/rmtj-1.png" alt="热门推荐" style="position:absolute;top:0;left:0; width:70px;height:70px;z-index:1000;" />
                <img src="/Images/shop-1.png" alt="SwissVita薇佳微晶3D全能精华1.5ml" style="width:320px;height:260px;" />
                <img src="/Images/gjdy-1.png" alt="高级订阅" style="position:absolute;top:206px;right:0; width:54px;height:54px;z-index:1000;" />
                <div style="padding:0 5px;font-size:18px;height:40px;line-height:40px;background-color:#aaa; overflow:hidden;width:auto;">
                    SwissVita薇佳微晶3D全能精华1.5ml
                </div>
                <div style="padding:0 5px;font-size:12px;height:40px;line-height:20px; overflow:hidden;width:auto;">
                    抗老化、抗皱、Q弹、锁水保湿、嫩白肌肤、维持肌肤健康保护力
                </div>
            </li>
            <li class="pull-left">
                <img src="/Images/rmtj-1.png" alt="热门推荐" style="position:absolute;top:0;left:0; width:70px;height:70px;z-index:1000;" />
                <img src="/Images/shop-2.png" alt="SwissVita薇佳微晶3D全能精华1.5ml" style="width:320px;height:260px;" />
                <img src="/Images/gjdy-1.png" alt="高级订阅" style="position:absolute;top:206px;right:0; width:54px;height:54px;z-index:1000;" />
                <div style="padding:0 5px;font-size:18px;height:40px;line-height:40px;background-color:#aaa; overflow:hidden;">
                    SwissVita薇佳微晶3D全能精华1.5ml
                </div>
                <div style="padding:0 5px;font-size:12px;height:40px;line-height:20px; overflow:hidden;">
                    抗老化、抗皱、Q弹、锁水保湿、嫩白肌肤、维持肌肤健康保护力
                </div>
            </li>
            <li class="pull-left">
                <img src="/Images/rmtj-1.png" alt="热门推荐" style="position:absolute;top:0;left:0; width:70px;height:70px;z-index:1000;" />
                <img src="/Images/shop-1.png" alt="SwissVita薇佳微晶3D全能精华1.5ml" style="width:320px;height:260px;" />
                <img src="/Images/gjdy-1.png" alt="高级订阅" style="position:absolute;top:206px;right:0; width:54px;height:54px;z-index:1000;" />
                <div style="padding:0 5px;font-size:18px;height:40px;line-height:40px;background-color:#aaa; overflow:hidden;">
                    SwissVita薇佳微晶3D全能精华1.5ml
                </div>
                <div style="padding:0 5px;font-size:12px;height:40px;line-height:20px; overflow:hidden;">
                    抗老化、抗皱、Q弹、锁水保湿、嫩白肌肤、维持肌肤健康保护力
                </div>
            </li>
        </ul>
    </div>
    <div class="clearfix" style="border-top:solid 1px #ccc;border-bottom:solid 1px #ccc;">
        <div class="pull-left" style="width:109px;height:30px;line-height:30px;text-align:center; border-right:solid 1px #ccc;">当前价：￥12</div>
        <div class="pull-right" style="width:210px;height:30px;line-height:30px;text-align:center;">
            <span class="text-red">￥8</span> <span>高级订阅会员价</span> ，<a href="#" class="text-danger">立即升级</a>
        </div>
    </div>
    <div style="padding:20px 10px;">
        <a href="#" class="icon-3" style="width:40px;height:34px;vertical-align:middle;border-right:solid 1px #ccc;display:inline-block;"></a>
        <span style="width:40px;height:34px; line-height:34px;text-align:center;font-size:18px;font-weight:800; vertical-align:middle; display:inline-block;">1</span>
        <a href="#" class="icon-4" style="width:40px;height:34px;vertical-align:middle;border-left:solid 1px #ccc;display:inline-block;"></a>
        <button type="submit" class="btn btn-danger btn-block" style="margin-left:30px;width:120px;display:inline-block;">立即订阅</button>
    </div>
    <div class="vip-info">
        <div style="float:left;width:200px;padding-left:20px;height:40px;line-height:40px;">
            账户余额：￥1000
        </div>
        <a style="float:right;width:120px;line-height:40px;background-color:#DC1570;text-align:center;display:inline-block;">
            立即订阅
        </a>
    </div>
</div>

<script>
    $(function () {
        function leftMove() {
            var curItem = $('.shop-list li.active');
            curItem.animate({
                'margin-left': '-320px'
            }, function () {
                $(this).next().addClass('active');
                $(this).removeClass('active')
                       .appendTo($(this).parent())
                       .css('margin-left', '0');
                cbMove();
            });
        }
        function rightMove() {
            var curItem = $('.shop-list li.active');
            $(curItem).parent().find('li:last()')
                               .css('margin-left', '-320px')
                               .prependTo($(curItem).parent())
                               .animate({
                                   'margin-left': '0'
                               }, function () {
                                   $(this).next().addClass('active');
                                   $(this).removeClass('active')
                                          .appendTo($(this).parent())
                                          .css('margin-left', '0');
                                   cbMove();
                               });
        }
        var timer;
        function cbMove() {
            timer = setTimeout(leftMove, 3000);
        }
        cbMove();
        $('.shop-list li').hover(function () {
            clearTimeout(timer);
        }, function () {
            cbMove();
        });
        $('.bar-left-enable').click(function () {
            clearTimeout(timer);
            $('.shop-list li.active').stop();
            rightMove();
        });
        $('.bar-right-enable').click(function () {
            clearTimeout(timer);
            $('.shop-list li.active').stop();
            leftMove();
        });
    });
</script>
@stop