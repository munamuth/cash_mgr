@extends('master')

@section('header')
<title>Tong Tin Management System</title>
@endsection

@section('body')
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <p><i class="fa fa-angle-right" style="padding-top: 2px;"></i> <a href="{{ route('player.index') }}">Tong Tin Player</a> / Edit</p>
            </div>
        </div>
    </div>
    <div class="container">
        <!-- start row -->
        <div class="row">
            <div class="col">
                <!-- START FORM CREATE -->
                <form action="{{ route('player.update', $player->id) }}" method="post" autocomplete="off">
                @csrf
                @method('put')
                <!-- START CARD  -->
                    <div class="card">
                        <div class="card-header">
                            Edit <span class="text-warning">{{ $player->name }}</span>
                            <a class="close" href="{{ route('player.index') }}">
                                <span aria-hidden="true">&times;</span>
                            </a>
                        </div>
                        <!-- START CARD-BODY -->
                        <div class="card-body">

                            <div class="form-group ">
                                <div class="row">
                                    <label for="name" class="col-12 col-sm-12 col-md-4">Name</label>
                                    <div class="col-12 col-sm-12 col-md-8">
                                        <input type="text" name="name" class="form-control form-control-sm" placeholder="Player's name" value="{{$player->name}}">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <label for="name" class="col-12 col-sm-12 col-md-4">Phone Number</label>
                                    <div class="col-12 col-sm-12 col-md-8">
                                        <input type="text" name="phone" class="form-control form-control-sm" placeholder="Player's phone number" value="{{ $player->phone}}">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <label for="address" class="col-12 col-sm-12 col-md-4">Address</label>
                                    <div class="col-12 col-sm-12 col-md-8">
                                        <textarea name="address" rows="2" class="form-control" placeholder="Player's address">{{$player->address}}</textarea>
                                    </div>
                                </div>
                            </div>
                            
                    
                        </div> 
                        <!-- END OF CARD-BDOY -->
                        <div class="card-footer">
                            <div class="text-right">
                            <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-download"></i> Save</button>
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