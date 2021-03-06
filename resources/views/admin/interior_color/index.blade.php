<?php
$head->appendScript('/admin/interior_color/interior_color.js');
$pageTitle = $pageSubTitle = trans('admin.interior_color.form.title');
$pageMenu = 'interior_color';
?>
@extends('core.layout')
@section('navButtons')
    <a href="{{route('admin_interior_color_create')}}" class="btn btn-primary pull-right">{{trans('admin.base.label.add')}}</a>
@stop
@section('content')
<div class="box-body">
    <table id="data-table" class="table table-bordered table-striped table-hover">
        <thead>
        <tr>
            <th>{{trans('admin.base.label.id')}}</th>
            <th>{{trans('admin.base.label.name')}}</th>
            <th class="th-actions"></th>
        </tr>
        </thead>
        <tbody></tbody>
    </table>
</div>
@stop