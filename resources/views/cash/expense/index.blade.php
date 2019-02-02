@extends('master')

@section('header')
<meta http-equiv="refresh" content="30">
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
		<div class="col-9 col-sm-6">Your Expense This Month: <span class="h4 text-danger">$ {{$total}}</span></div>
		<div class="col-3 col-sm-6 text-right">
			<a class="btn btn-success btn-sm" href="{{ route('expense.create') }}"><i class="fa fa-plus"></i> Create</a>

		</div>
	</div>
	<br>
	<div class="row animated fadeIn">
		<div class="col">
			<div class="table-responsive">
				<table class="table table-tripped">
					<thead>
						<tr>
							<th style="min-width: 15px">ID</th>
							<th style="min-width: 200px">Name</th>
							@if( Auth::user()->role == 1 )
							<th style="min-width: 200px">User Name</th>
							@endif
							<th style="min-width: 150px">Type</th>
							<th style="min-width: 150px">Amount</th>
							<th style="min-width: 200px">Date</th>
							<th style="min-width: 200px">Action</th>
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
								<td class="text-danger font-weight-bold">$ {{$ex->amount}}</td>
								<td>{{$ex->created_at}}</td>
								<td class="d-flex">
									<a class="btn btn-success btn-sm" href="{{ route('expense.edit', $ex->id) }}"><i class="fa fa-edit"></i> Edit</a>
									&nbsp;
									<form action="{{route('expense.destroy', $ex->id) }}" method="post">
										@csrf
										@method('delete')
									<button type="submit" class="btn btn-danger btn-sm" href="{{ route('expense.show', $ex->id) }}"><i class="fa fa-trash"></i> Destroy</button>
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