@extends('master')

@section('header')

@endsection

@section('body')
<div class="">
	<br>
	<div class="row animated fadeIn">
		<div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-4 m-auto">
			<div class="card animated zoomIn">
				<div class="card-header">
					{{ trans('lang.new_type') }}
					<a class="close" href="{{ route('type.index', $local) }}">
			          <span aria-hidden="true">&times;</span>
			        </a>
				</div>
				<form action="{{ route('type.update', [$local, $type->id]) }}" method="post" enctype="multipart/form-data">
					@csrf
					@method('put')
					<div class="card-body">

						<div class="row form-group">
							<div class="col-12 col-sm-4">
								<LABEL>{{ trans('lang.name') }}</LABEL>
							</div>
							<div class="col-12 col-sm-8">
								<input type="text" name="name" class="form-control form-control-sm" value="{{$type->name}}">
							</div>
						</div>

						<div class="row form-group">
							<div class="col-12 col-sm-4">
								<LABEL>{{ trans('lang.type_of') }}</LABEL>
							</div>
							<div class="col-12 col-sm-8">
								<select name="type_of" class="form-control form-control-sm">
									<option value="Income">Income</option>
									<option value="Expense">Expense</option>
								</select>
							</div>
						</div>

						<div class="row form-group">
							<div class="col-12 col-sm-12">
								<div class="text-right">
									<button type="submit" class="btn btn-success btn-sm"><i class="fa fa-download"></i> {{ trans('lang.update') }}</button>
								</div>
							</div>
						</div>

					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection