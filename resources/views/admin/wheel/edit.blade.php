<?php
use App\Models\Wheel\Wheel;

$head->appendScript('/admin/wheel.js');
$pageTitle = trans('admin.wheel.form.title');
$pageMenu = 'wheel';
if ($saveMode == 'add') {
    $pageSubTitle = trans('admin.wheel.form.add.sub_title');
    $url = route('admin_wheel_store');
} else {
    $pageSubTitle = trans('admin.wheel.form.edit.sub_title', ['id' => $wheel->id]);
    $url = route('admin_wheel_update', $wheel->id);
}
?>
@extends('admin.layout')
@section('content')
<form id="edit-form" class="form-horizontal" method="post" action="{{$url}}">
    <div class="box-body">
        <div class="form-group">
            <label class="col-sm-3 control-label data-req">{{trans('admin.base.label.name')}}</label>
            <div class="col-sm-9">
                <input type="text" name="name" class="form-control" value="{{$wheel->name or ''}}">
                <div id="form-error-name" class="form-error"></div>
            </div>
        </div>
        {{csrf_field()}}
    </div>
    <div class="box-footer">
        <input type="submit" class="nav-btn nav-btn-save btn btn-primary" value="{{trans('admin.base.label.save')}}">
        <a href="{{route('admin_wheel_table')}}" class="nav-btn nav-btn-cancel btn btn-default">{{trans('admin.base.label.cancel')}}</a>
    </div>
</form>
@stop