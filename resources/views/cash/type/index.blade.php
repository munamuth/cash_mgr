@extends('master')

@section('header')

@endsection

@section('body')
<div class="">
	<br>
	<div class="row animated bounceInLeft">
		<div class="col text-right">
			<a class="btn btn-success btn-sm" href="{{ route('type.create', $local) }}"><i class="fa fa-plus"></i> {{ trans('lang.create') }}</a>
		</div>
	</div>
	<br>
	<div class="row animated fadeIn">
		<div class="col">
			<div class="table-responsive">
				<table class="table table-tripped">
					<thead>
						<tr>
							<th style="min-width: 10px">{{ trans('lang.no') }}</th>
							<th style="min-width: 150px">{{ trans('lang.name') }}</th>							
							@if( Auth::user()->role == 1 )
							<th style="min-width: 150px">{{ trans('lang.creator') }}</th>
							@endif
							<th style="min-width: 100px">{{ trans('lang.create') }}</th>
							<th style="min-width: 200px">{{ trans('lang.created') }}</th>
							<th style="min-width: 200px">{{ trans('lang.updated') }}</th>
							<th style="min-width: 200px">{{ trans('lang.action') }}</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>1</td>
							<td>Salary</td>
							<td>Default</td>
							<td>Income</td>
							<td>2019-01-31</td>
							<td>2019-01-31</td>
							<td></td>
						</tr>
						<tr>
							<td>2</td>
							<td>Food</td>
							<td>Default</td>
							<td>Expense</td>
							<td>2019-01-31</td>
							<td>2019-01-31</td>
							<td></td>
						</tr>
						@foreach( $types as $index => $type )
						<tr>
							<td>{{$index + 3}}</td>
							<td>{{$type->name}}</td>
							@if( Auth::user()->role == 1 )
							<td>{{$type->getUserName->name}}</td>
							@endif
							<td>{{$type->type_of}}</td>
							<td>{{$type->created_at}}</td>
							<td>{{$type->updated_at}}</td>
							<td class="d-flex">
								<a class="btn btn-warning btn-sm" href="{{ route('type.edit', [$local, $type->id]) }}"><i class="fa fa-edit"></i> {{ trans('lang.edit') }}</a>
									&nbsp;
								<form action="{{ route('type.destroy', [$local, $type->id]) }}" method="post">
									@csrf
									@method('delete')
									<button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> {{ trans('lang.destroy') }}</button>
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
@endsection