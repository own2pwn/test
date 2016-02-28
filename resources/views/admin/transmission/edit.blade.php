<?php
use App\Models\Transmission\Transmission;

$head->appendScript('/admin/transmission.js');
$pageTitle = trans('admin.transmission.form.title');
$pageMenu = 'transmission';
if ($saveMode == 'add') {
    $pageSubTitle = trans('admin.transmission.form.add.sub_title');
    $url = route('admin_transmission_store');
} else {
    $pageSubTitle = trans('admin.transmission.form.edit.sub_title', ['id' => $transmission->id]);
    $url = route('admin_transmission_update', $transmission->id);
}
$mls = $transmission->ml->keyBy('lng_id');
?>
@extends('admin.layout')
@section('content')
<form id="edit-form" class="form-horizontal" method="post" action="{{$url}}">
    <div class="box-body">
        <div class="form-group">
            <label class="col-sm-3 control-label data-req">{{trans('admin.base.label.name')}}</label>
            <div class="col-sm-9">
                @foreach($languages as $lng)
                    <div class="form-group form-group-inner">
                        <input type="text" name="ml[{{$lng->id}}][name]" class="form-control" value="{{isset($mls[$lng->id]) ? $mls[$lng->id]->name : ''}}" placeholder="{{$lng->name}}">
                        <div id="form-error-ml_{{$lng->id}}_name" class="form-error"></div>
                    </div>
                @endforeach
                <div id="form-error-ml" class="form-error"></div>
            </div>
        </div>
        {{csrf_field()}}
    </div>
    <div class="box-footer">
        <input type="submit" class="nav-btn nav-btn-save btn btn-primary" value="{{trans('admin.base.label.save')}}">
        <a href="{{route('admin_transmission_table')}}" class="nav-btn nav-btn-cancel btn btn-default">{{trans('admin.base.label.cancel')}}</a>
    </div>
</form>
@stop