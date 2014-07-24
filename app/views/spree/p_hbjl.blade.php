@extends('shared.layout')

@section('content')
<div class="center-block spree-hbjl">
    <div style="width:250px;margin:auto;">
        <p><strong>红包记录</strong></p>
        <table style="margin-top:20px;margin-bottom:40px;width:100%;">
            <tr style="height:30px;border-bottom:solid 1px #ccc;">
                <td style="width:120px;text-align:left; overflow:hidden;">两周年红包</td>
                <td style="color:#aaa;">2014年5月</td>
                <td style="width:50px;text-align:right; overflow:hidden;">5元</td>
            </tr>
            <tr style="height:30px;border-bottom:solid 1px #ccc;">
                <td style="width:120px;text-align:left; overflow:hidden;">两周年红包</td>
                <td style="color:#aaa;">2014年5月</td>
                <td style="width:50px;text-align:right; overflow:hidden;">5元</td>
            </tr>
            <tr style="height:30px;border-bottom:solid 1px #ccc;">
                <td style="width:120px;text-align:left; overflow:hidden;">两周年红包</td>
                <td style="color:#aaa;">2014年5月</td>
                <td style="width:50px;text-align:right; overflow:hidden;">5元</td>
            </tr>
        </table>
        <div class="clearfix" style="padding-top:10px;border-top:solid 1px #000;">
            <div class="pull-left" style="width:100px; height:30px;">
                <button type="submit" class="btn btn-danger btn-block">领 红 包</button>
            </div>
            <div class="pull-right" style="width:140px;">
                <button type="submit" class="btn btn-danger btn-block">邀请好友领红包</button>
            </div>
        </div>
        <p class="small" style="margin-top:10px;text-align:center;">
            <a href="#">关于红包</a>            
        </p>
        <p class="small" style="padding-bottom:10px;text-align:right;">
            LOLITABOX.COM
        </p>
    </div>
</div>
@stop