<?php
use App\Core\Helpers\ImgUploader;

$head->appendScript('/admin/config/config.js');
$pageTitle = $pageSubTitle = trans('admin.config.form.title');
$pageMenu = 'config';

$logoMls = [];
if ($logo != null) {
    $logoMls = $logo->ml->keyBy('lng_id');
}
?>
@extends('core.layout')
@section('content')
<form id="edit-form" class="form-horizontal" method="post" action="{{route('admin_config_update')}}">
    <div class="box-body">

        @foreach($languages as $lng)
            <div class="form-group">
                <label class="col-sm-3 control-label data-req">{{trans('admin.base.label.logo').' ('.$lng->code.')'}}</label>
                <div class="col-sm-9">
                    <?php
                    $value = isset($logoMls[$lng->id]) ? $logoMls[$lng->id]->value : '';
                    ImgUploader::uploader('config', 'logo', 'logo['.$lng->id.'][image]', $value, 'logo_'.$lng->id.'_image');
                    ?>
                </div>
            </div>
        @endforeach

        <div class="form-group">
            <label class="col-sm-3 control-label data-req">{{trans('admin.base.label.watermark')}}</label>
            <div class="col-sm-9">
                <?php ImgUploader::uploader('config', 'watermark', 'watermark', $watermark); ?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label data-req">{{trans('admin.base.label.auto_empty')}}</label>
            <div class="col-sm-9">
                <?php ImgUploader::uploader('config', 'auto_empty', 'auto_empty', $autoEmpty); ?>
            </div>
        </div>

        {{csrf_field()}}
    </div>
    <div class="box-footer">
        <input type="submit" class="nav-btn nav-btn-save btn btn-primary" value="{{trans('admin.base.label.save')}}">
    </div>
</form>
@stop