@extends('master')

@section('header')
<title>Tong Tin Management System</title>
@endsection

@section('body')
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <p><i class="fa fa-angle-right" style="padding-top: 2px;"></i>{{ trans('lang.player_list') }}</a></p>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="card">
            <div class="card-header">{{ trans('lang.player_list') }}</div>
        </div>
        <div class="card-bod p-0">
            <table class="table table-hoverred">
                <thead>
                    <th>{{ trans('lang.no') }}</th>
                    <th>{{ trans('lang.name') }}</th>
                    <th>{{ trans('lang.action') }}</th>
                </thead>
            </table>
        </div>
    </div>
@endsection