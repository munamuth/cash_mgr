@extends('master')

@section('header')
<title>Tong Tin Management System</title>
@endsection

@section('body')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-sm-6">
                <p><i class="fa fa-angle-right" style="padding-top: 2px;"></i> Tong Tin</p>
            </div>
            <div class="col-12 col-sm-6">
                <div class="text-right">
                    <a href="{{ route('tongtins.create') }}" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Create</a>
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
                                        <th>Price</th>
                                        <th>Leader</th>
                                        <th>Payout Type</th>
                                        <th>Player List</th>
                                        <th>Action</th>
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
                                            <a href="{{ route('tongtins.edit', 1) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit</a>
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