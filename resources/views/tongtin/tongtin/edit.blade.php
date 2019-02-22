@extends('master')

@section('header')
<title>Tong Tin Management System</title>
@endsection

@section('body')
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <p><i class="fa fa-angle-right" style="padding-top: 2px;"></i> <a href="{{ route('tongtins.index', $local) }}"> {{ trans('lang.tongtin') }} </a> / {{ trans('lang.edit') }}</p>
            </div>
        </div>
    </div>
    <div class="container">
        <!-- start row -->
        <div class="row">
            <div class="col">
                <!-- START FORM CREATE -->
                <form action="{{ route('tongtins.store', $local) }}" method="post" autocomplete="off">
                @csrf
                <!-- START CARD  -->
                    <div class="card">
                        <div class="card-header">
                            {{ trans('lang.edit') }} 
                            <a class="close" href="{{ route('tongtins.index', $local) }}">
                                <span aria-hidden="true">&times;</span>
                            </a>
                        </div>
                        <!-- START CARD-BODY -->
                        <div class="card-body">

                            <div class="form-group ">
                                <div class="row">
                                    <label for="name" class="col-12 col-sm-12 col-md-4">{{ trans('lang.leader_name') }}</label>
                                    <div class="col-12 col-sm-12 col-md-8">
                                        <select name="leader_id" class="form-control form-control-sm">
                                            <option value="0">{{ trans('lang.select_leader') }}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <label for="name" class="col-12 col-sm-12 col-md-4">{{ trans('lang.price') }}</label>
                                    <div class="col-12 col-sm-12 col-md-8">
                                        <input type="text" name="price" class="form-control form-control-sm" placeholder="{{ trans('lang.tongtin_price') }}">
                                    </div>
                                </div>
                            </div>


                            <div class="form-group ">
                                <div class="row">
                                    <label for="name" class="col-12 col-sm-12 col-md-4">{{ trans('lang.payment_type') }}</label>
                                    <div class="col-12 col-sm-12 col-md-8">
                                        <select name="leader_id" class="form-control form-control-sm">
                                            <option value="0">{{ trans('lang.select_payment_type') }}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                        </div> 
                        <!-- END OF CARD-BDOY -->
                    </div>
                    <div class="card-footer bg-secondary">
                        <div class="text-right">
                        <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-download"></i> {{ trans('lang.save') }}</button>
                        </div>
                    </div>
                    <!-- END OF CARD -->
                    
                </form>
                <!-- END OF FORM CREATE USER -->
            </div>
        </div>
    </div>
@endsection