@extends('master')

@section('header')

@endsection

@section('body')
<div class="">
	<div class="row">
		<div class="col">
			<p><i class="fa fa-angle-right" style="padding-top: 2px;"></i> Income Records </p>
		</div>
	</div>
	<br>
	<div class="row animated bounceInLeft">

		<div class="col-9 col-sm-6">Your Income This Month: <span class="h4 text-success">៛ {{ number_format($total) }}</span></div>
		<div class="col-3 col-sm-6 text-right">
			<a class="btn btn-success btn-sm" href="{{ route('income.create') }}"><i class="fa fa-plus"></i> Create</a>
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
							@if(Auth::user()->role == 1)
							<th style="min-width: 150px">User Name</th>
							@endif
							<th style="min-width: 150px">Type</th>
							<th style="min-width: 50px">Amount</th>
							<th style="min-width: 200px">Date</th>
							<th style="min-width: 200px">Action</th>
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
									<a class="btn btn-success btn-sm" href="{{ route('income.edit', $in->id) }}"><i class="fa fa-edit"></i> Edit</a>
									&nbsp;
									<form action="{{route('income.destroy', $in->id) }}" method="post">
										@csrf
										@method('delete')
									<button type="submit" class="btn btn-danger btn-sm" href="{{ route('income.show', $in->id) }}"><i class="fa fa-trash"></i> Destroy</button>
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