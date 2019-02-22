@extends('master')

@section('header')
@endsection

@section('body')
<div class="">
	<div class="row">
		<div class="col">
			<p><i class="fa fa-angle-right" style="padding-top: 2px;"></i> Expense Records </p>
		</div>
	</div>
	<br>
	<div class="row animated bounceInLeft">
		<div class="col-12 col-sm-9">
			<form class="form-inline" action="{{ url('expense/search', $local) }}" method="get">
				
					<label>Type </label>
					<select class="form-control form-control-sm">
						<option>{{ trans('lang.select_type') }}</option>
					</select>
					<button class="btn btn-success btn-sm">{{ trans('lang.search') }}</button>
			</form>
		</div>
		<div class="col-12 col-sm-3 text-right">
			<a class="btn btn-success btn-sm" href="{{ route('expense.create', $local) }}"><i class="fa fa-plus"></i> {{trans('lang.create') }}</a>

		</div>
		<div class="col-12 col-sm-12 text-right mt-3">Your Expense This Month: <span class="h4 text-danger">៛ {{number_format($total)}}</span></div>
	</div>
	<br>
	<div class="row animated fadeIn">
		<div class="col">
			<div class="table-responsive">
				<table class="table table-tripped">
					<thead>
						<tr>
							<th style="min-width: 15px">{{ trans('lang.no') }}</th>
							<th style="min-width: 200px">{{ trans('lang.name') }}</th>
							@if( Auth::user()->role == 1 )
							<th style="min-width: 200px">{{ trans('lang.username') }}</th>
							@endif
							<th style="min-width: 150px">{{ trans('lang.type') }}</th>
							<th style="min-width: 150px">{{ trans('lang.amount') }}</th>
							<th style="min-width: 200px">{{ trans('lang.date') }}</th>
							<th style="min-width: 200px">{{ trans('lang.action') }}</th>
						</tr>
					</thead>
					<tbody>
						@foreach( $expense as $index => $ex )
							<tr>
								<td>{{$index+1}}</td>
								<td>{{$ex->name}}</td>
								@if(Auth::user()->role == 1)
								<th>{{$ex->getUserName->name}}</th>
								@endif
								@if(!empty($ex->getType))
								<td>{{$ex->getType->name}}</td>
								@else
								<td>NULL</td>
								@endif
								<td class="text-danger text-right font-weight-bold">៛ {{number_format($ex->amount)}}</td>
								<td>{{$ex->created_at->format('d/m/Y')}}</td>
								<td class="d-flex">
									<a class="btn btn-success btn-sm" href="{{ route('expense.edit', [$local, $ex->id]) }}"><i class="fa fa-edit"></i> Edit</a>
									&nbsp;
									<form action="{{route('expense.destroy', [$local, $ex->id]) }}" method="post">
										@csrf
										@method('delete')
									<button type="submit" class="btn btn-danger btn-sm" href="{{ route('expense.show', [$local, $ex->id]) }}"><i class="fa fa-trash"></i> Destroy</button>
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