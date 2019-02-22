@extends('master')

@section('header')
<title>Tong Tin Management System</title>
@endsection

@section('body')
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <p><i class="fa fa-angle-right" style="padding-top: 2px;"></i> <a href="{{ route('player.index', $local) }}">{{ trans('lang.player') }}</a> / {{ trans('lang.edit') }}</p>
            </div>
        </div>
    </div>
    <div class="container">
        <!-- start row -->
        <div class="row">
            <div class="col">
                <!-- START FORM CREATE -->
                <form action="{{ route('player.update', [$local, $player->id]) }}" method="post" autocomplete="off">
                @csrf
                @method('put')
                <!-- START CARD  -->
                    <div class="card">
                        <div class="card-header">
                            {{ trans('lang.edit') }} <span class="text-warning">{{ $player->name }}</span>
                            <a class="close" href="{{ route('player.index', $local) }}">
                                <span aria-hidden="true">&times;</span>
                            </a>
                        </div>
                        <!-- START CARD-BODY -->
                        <div class="card-body">

                            <div class="form-group ">
                                <div class="row">
                                    <label for="name" class="col-12 col-sm-12 col-md-4">{{ trans('lang.name') }}</label>
                                    <div class="col-12 col-sm-12 col-md-8">
                                        <input type="text" name="name" class="form-control form-control-sm" placeholder="{{ trans('lang.name') }}" value="{{$player->name}}">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <label for="name" class="col-12 col-sm-12 col-md-4">{{ trans('lang.phone') }}</label>
                                    <div class="col-12 col-sm-12 col-md-8">
                                        <input type="text" name="phone" class="form-control form-control-sm" placeholder="{{ trans('lang.phone') }}" value="{{ $player->phone}}">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <label for="address" class="col-12 col-sm-12 col-md-4">{{ trans('lang.address') }}</label>
                                    <div class="col-12 col-sm-12 col-md-8">
                                        <textarea name="address" rows="2" class="form-control" placeholder="{{ trans('lang.address') }}">{{$player->address}}</textarea>
                                    </div>
                                </div>
                            </div>
                            
                    
                        </div> 
                        <!-- END OF CARD-BDOY -->
                        <div class="card-footer">
                            <div class="text-right">
                            <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-download"></i> {{ trans('lang.save') }}</button>
                            </div>
                        </div>
                    </div>
                    <!-- END OF CARD -->
                    
                </form>
                <!-- END OF FORM CREATE USER -->
            </div>
        </div>
    </div>
@endsection