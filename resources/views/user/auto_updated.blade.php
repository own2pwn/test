<?php

$title = trans('www.profile_changed.text');

?>
@extends('layout')

@section('content')

<div class="page">
    <div id="top-banner" class="tc">
        <a href="#">
            <img src="/images/temp/top-banner.jpg" />
        </a>
    </div>

    <div id="reg-success" class="tc">
        {{trans('www.auto_updated.text')}}
        <br />
        <br />
        <br />
        <a href="{{route('profile_autos', cLng('code'))}}" class="orange underline">{{trans('www.base.label.back_to_list')}}</a>
    </div>

</div>

@stop