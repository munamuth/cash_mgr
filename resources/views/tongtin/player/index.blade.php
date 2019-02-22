@extends('master')

@section('header')
<title>Tong Tin Management System</title>
@endsection

@section('body')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-sm-6">
                <p><i class="fa fa-angle-right" style="padding-top: 2px;"></i> Tong Tin Player</p>
            </div>
            <div class="col-12 col-sm-6">
                <div class="text-right">
                    <a href="{{ route('player.create') }}" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Create</a>
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
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Address</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach( $players as $index => $player )
                                    <tr>
                                        <td>{{$index+1}}</td>
                                        <td>{{$player->name}}</td>
                                        <td>{{$player->phone}}</td>
                                        <td>{{$player->address}}</td>
                                        <td class="d-flex">
                                            <a href="{{ route('player.edit', 1) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                            <a href="#" class="btn btn-info btn-sm" onclick ="btnDetail_click({{$player->id}})"><i class="fa fa-eye"></i> Detail</a>
                                            <form action="{{ route('player.destroy', $player->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Destroy</button>
                                            </form>

                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <div class="modal" tabindex="-1" role="dialog" id="modalShow">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-4 col-sm-4 col-md-3">
                            Name
                        </div>
                        <div class="col-8 col-sm-8 col-md-9">
                            <p id="name"></p>
                        </div>
                        <div class="col-4 col-sm-4 col-md-3">
                            Phone
                        </div>
                        <div class="col-8 col-sm-8 col-md-9">
                            <p id="phone"></p>
                        </div>
                         <div class="col-4 col-sm-4 col-md-3">
                            Addfess
                        </div>
                        <div class="col-8 col-sm-8 col-md-9">
                            <p id="address"></p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        function btnDetail_click(id) {
            $.ajax({
                url : "/tongtin/player/"+id,
                type : 'get',
                success : function(data){
                    console.log(data)
                    $('#modalShow').modal();
                    $("#name").html(data.DATA.name)
                    $("#phone").html(data.DATA.phone)
                    $("#address").html(data.DATA.address)
                },  
                error : function(data){
                    console.log("error");
                }
            })
        }
    </script>
@endsection