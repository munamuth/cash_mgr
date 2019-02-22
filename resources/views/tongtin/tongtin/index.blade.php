@extends('master')

@section('header')
<title>Tong Tin Management System</title>
@endsection

@section('body')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-sm-6">
                <p><i class="fa fa-angle-right" style="padding-top: 2px;"></i> {{ trans('lang.tongtin') }}</p>
            </div>
            <div class="col-12 col-sm-6">
                <div class="text-right">
                    <a href="{{ route('tongtins.create', $local ) }}" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> {{ trans('lang.create') }}</a>
                </div>

            </div>
        </div>
    </div>
    <div class="container-fluid">
        <!-- start row -->
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-tripped">
                                <thead>
                                    <tr>
                                        <th>{{ trans('lang.no') }}</th>
                                        <th>{{ trans('lang.price') }}</th>
                                        <th>{{ trans('lang.leader_name') }}</th>
                                        <th>{{ trans('lang.payment_type') }}</th>
                                        <th>{{ trans('lang.player_list') }}</th>
                                        <th>{{ trans('lang.action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Muth</td>
                                        <td>069394383</td>
                                        <td>069394383</td>
                                        <td>069394383</td>
                                        <td>
                                            <a href="{{ route('tongtins.edit', [$local , 1]) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> {{ trans('lang.edit') }}</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection