@extends('master')

@section('header')

@endsection

@section('body')
<div class="">
	<div class="row">
		<div class="col">
			<p><i class="fa fa-angle-right" style="padding-top: 2px;"></i> {{ trans('lang.income_record') }} </p>
		</div>
	</div>
	<br>
	<div class="row animated bounceInLeft">

		<div class="col-9 col-sm-6">Your Income This Month: <span class="h4 text-success">៛ {{ number_format($total) }}</span></div>
		<div class="col-3 col-sm-6 text-right">
			<a class="btn btn-success btn-sm" href="{{ route('income.create', $local) }}"><i class="fa fa-plus"></i> {{ trans('lang.create') }}</a>
		</div>
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
							@if(Auth::user()->role == 1)
							<th style="min-width: 150px">{{ trans('lang.username') }}</th>
							@endif
							<th style="min-width: 150px">{{ trans('lang.type') }}</th>
							<th style="min-width: 50px">{{ trans('lang.amount') }}</th>
							<th style="min-width: 200px">{{ trans('lang.date') }}</th>
							<th style="min-width: 200px">{{ trans('lang.action') }}</th>
						</tr>
					</thead>
					<tbody>
						@foreach( $income as $index => $in )
							<tr>
								<td>{{$index+1}}</td>
								<td>{{$in->name}}</td>
								@if(Auth::user()->role == 1)
								<th>{{$in->getUserName->name}}</th>
								@endif
								@if(!empty($in->getType))
								<td>{{$in->getType->name}}</td>
								@else
								<td>NULL</td>
								@endif
								<td class="text-right text-success font-weight-bold">៛​​ <span class="text-right">{{number_format($in->amount)}}</span></td>
								<td>{{$in->created_at->format('d/m/Y')}}</td>
								<td class="d-flex">
									<a class="btn btn-success btn-sm" href="{{ route('income.edit', [$local ,$in->id]) }}"><i class="fa fa-edit"></i> {{ trans('lang.edit') }}</a>
									&nbsp;
									<form action="{{route('income.destroy',[$local, $in->id]) }}" method="post">
										@csrf
										@method('delete')
									<button type="submit" class="btn btn-danger btn-sm" href="{{ route('income.show',[$local ,$in->id]) }}"><i class="fa fa-trash"></i> {{ trans('lang.destroy') }}</button>
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