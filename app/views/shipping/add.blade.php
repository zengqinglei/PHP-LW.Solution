@extends('shared.layout')

@section('content')
<div class="center-block shipping-add">
    <div class="top clearfix">
        <div style="float:left;padding-left:10px;width:50px;height:30px;line-height:30px;font-size:20px;">
            <a class="glyphicon glyphicon-arrow-left" href="javascript:void(0);" onclick="goHistory(-1);"></a>
        </div>
        <div class="title-1" style="padding-left:100px;padding-top:2px;height:28px;">
            <span class="icon-1"></span>
            <strong>新增收货地址</strong>
            <span class="icon-1"></span>
        </div>
    </div>
    {{ Form::open(array('class'=>'form-horizontal form-shipping-add','url' => 'shipping/add')) }}
    	<input name="backurl" type="hidden" value="{{ $backurl }}">
        <div class="form-group">
            <input class="form-control" name="linkman" type="text" value="{{Input::old('linkman')}}" placeholder="收货人姓名" required autofocus />
            <div class="text-warning">{{ $errors->first('linkman'); }}</div>
        </div>
        <div class="form-group">
            <input class="form-control" name="telphone" type="tel" value="{{Input::old('telphone')}}" placeholder="联系电话" required />
            <div class="text-warning">{{ $errors->first('telphone'); }}</div>
        </div>
        <div class="form-group form-inline">
            <select class="form-control select-province" name="province" style="width:100px;" required>
                <option>省份</option>
            </select>
            <select class="form-control select-city" name="city" style="width:100px;" required>
                <option>城市</option>
            </select>
            <select class="form-control select-area" name="district" style="width:100px;" required>
                <option>区\县</option>
            </select>
            <div class="text-warning">{{ $errors->first('province'); }}</div>
            <div class="text-warning">{{ $errors->first('city'); }}</div>
            <div class="text-warning">{{ $errors->first('district'); }}</div>
        </div>
        <div class="form-group">
            <input class="form-control" name="address" type="text" value="{{Input::old('address')}}" placeholder="详细地址" required />
            <div class="text-warning">{{ $errors->first('address'); }}</div>
        </div>
        <div class="form-group">
            <input class="form-control" name="postcode" type="text" value="{{Input::old('postcode')}}" placeholder="邮政编码" required />
            <div class="text-warning">{{ $errors->first('postcode'); }}</div>
        </div>
        <div class="form-group">
            <label class="checkbox-inline">
                <input name="if_active" type="checkbox" value="1" checked> 是否设置成默认地址
            </label>
            <div class="text-warning">{{ $errors->first('if_active'); }}</div>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-danger btn-block">确认完成</button>
            <div class="text-warning"><?php echo @$submit_result; ?></div>
        </div>
    {{ Form::close() }}
</div>
@stop

@section('scripts')
<script>
	$(function(){ areaLinkage(true); });
</script>
@stop