@extends('master')

@section('header')

@endsection

@section('body')
	<div class="row">
		<div class="col">
			<p><i class="fa fa-angle-right" style="padding-top: 2px;"></i> Expense Records / Create New</p>
		</div>
	</div>
	<div class="row">
		<div class="col">
			
			<form action="{{ route('income.store') }}" method="post" enctype="multipart/form-data" autocomplete="off">
				@csrf
				@method('post')
				<div class="row">
					<div class="col-12 col-sm-12 col-md-10 col-lg-6 m-auto">
						<div class="card animated zoomIn">
							<div class="card-header">
								New Income
								<a class="close" href="{{ route('income.index') }}">
						          <span aria-hidden="true">&times;</span>
						        </a>
							</div>
							<div class="card-body">
								<div class="form-group row">
									<div class="col-12 col-sm-6">Date</div>
									<div class="col-12 col-sm-6"><input class="form-control form-control-sm datepicker" type="text" name="create"></div>
								</div>
								<div class="form-group row">
									<div class="col-12 col-sm-6">Income Name</div>
									<div class="col-12 col-sm-6"><input class="form-control form-control-sm" type="text" name="name"></div>
								</div>
								<div class="form-group row">
									<div class="col-12 col-sm-6">Income type</div>
									<div class="col-12 col-sm-6">
										<select class="form-control form-control-sm" name="type">
											<option value="1">Salary</option>
											@foreach( $types as $type )
												<option value="{{$type->id}}">{{$type->name}}</option>
											@endforeach
										</select>
										
									</div>
								</div>
								<div class="form-group row">
									<div class="col-12 col-sm-6">Amount</div>
									<div class="col-12 col-sm-6"><input class="form-control form-control-sm" type="text" name="amount"></div>
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