@extends('shared.layout')

@section('content')
<div class="center-block spree-hbjl">
    <div style="width:250px;margin:auto;">
        <p><strong>红包记录</strong></p>
        @if(is_null($hbjl))
        	 <p>您还没有领过红包哦！</p>
        @else
        	<table style="margin-top:20px;margin-bottom:40px;width:100%;">
        		@foreach($hbjl as $item)
        			<tr style="height:30px;border-bottom:solid 1px #ccc;">
		                <td style="width:120px;text-align:left; overflow:hidden;">{{$item->activitytype}}</td>
		                <td style="color:#aaa;">{{ date('Y-m-d',strtotime($item->addtime)) }}</td>
		                <td style="width:50px;text-align:right; overflow:hidden;">{{ $item->giftinfo }}元</td>
		            </tr>
        		@endforeach
	        </table>
        @endif        
        <div class="clearfix" style="padding-top:10px;border-top:solid 1px #000;">
            <div class="pull-left" style="width:100px; height:30px;">
                <a href="{{URL::to('spree/p_lhb');}}" class="btn btn-danger btn-block">领 红 包</a>
            </div>
            <div class="pull-right" style="width:140px;">
                <a href="{{URL::to('spree/p_yqhylhb');}}" class="btn btn-danger btn-block">邀请好友领红包</a>
            </div>
        </div>
        <p class="small" style="margin-top:10px;text-align:center;">
            <a href="{{URL::to('spree/p_gyhb');}}">关于红包</a>            
        </p>
        <p class="small" style="padding-bottom:10px;text-align:right;">
            LOLITABOX.COM
        </p>
    </div>
</div>
@stop