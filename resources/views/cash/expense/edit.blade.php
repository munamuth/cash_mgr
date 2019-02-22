@extends('master')

@section('header')

@endsection

@section('body')
	<div class="row">
		<div class="col">
			
			<form action="{{ route('expense.update', [$local, $expense->id]) }}" method="post" enctype="multipart/form-data" autocomplete="off">
				@csrf
				@method('put')
				<div class="row">
					<div class="col-12 col-sm-12 col-md-10 col-lg-6 m-auto">
						<div class="card animated zoomIn">
							<div class="card-header">
								Edit {{$expense->name}}
								<a class="close" href="{{ route('expense.index', $local) }}">
						          <span aria-hidden="true">&times;</span>
						        </a>
							</div>
							<div class="card-body">
								<div class="form-group row">
									<div class="col-12 col-sm-6">Date</div>
									<div class="col-12 col-sm-6">
										<input class="form-control form-control-sm datepicker" type="text" name="create" value="{{ ($expense->created_at)->format('d/m/Y') }}">
									</div>
								</div>
								<div class="form-group row">
									<div class="col-12 col-sm-6">Income Name</div>
									<div class="col-12 col-sm-6">
										<input class="form-control form-control-sm" type="text" name="name" value="{{ $expense->name }}">
									</div>
								</div>
								<div class="form-group row">
									<div class="col-12 col-sm-6">Income type</div>
									<div class="col-12 col-sm-6">
										<select class="form-control form-control-sm" name="type" >
											@foreach( $types as $type )
												@if( $expense->type == $type->id )
												<option value="{{$type->id}}" selected>{{$type->name}}</option>
												@else 
												<option value="{{$type->id}}">{{$type->name}}</option>
												@endif
											@endforeach
										</select>
										
									</div>
								</div>
								<div class="form-group row">
									<div class="col-12 col-sm-6">Amount</div>
									<div class="col-12 col-sm-6"><input class="form-control form-control-sm" type="text" name="amount" value="{{ $expense->amount }}"></div>
								</div>
								<div class="text-right">
									<button type="submit" class="btn btn-success btn-sm"><i class="fa fa-download"></i> Save</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
@endsection