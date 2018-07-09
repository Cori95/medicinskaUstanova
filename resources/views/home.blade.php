@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-heading">@lang('quickadmin.qa_dashboard')</div>

                <div class="panel-body">
                   <p style="font-size: 100px; text-align: center; font-weight: 20%;"> @lang('quickadmin.qa_dashboard_text') {{$user->name}}! </p>
                    <img src="http://www.clker.com/cliparts/W/p/p/h/u/C/rod-of-asclepius-upright.svg" class="col-md-12">
                </div>
            </div>
        </div>
    </div>
@endsection
