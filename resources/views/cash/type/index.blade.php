@extends('master')

@section('header')

@endsection

@section('body')
<div class="">
	<br>
	<div class="row animated bounceInLeft">
		<div class="col text-right">
			<a class="btn btn-success btn-sm" href="{{ route('type.create') }}"><i class="fa fa-plus"></i> Create</a>
		</div>
	</div>
	<br>
	<div class="row animated fadeIn">
		<div class="col">
			<div class="table-responsive">
				<table class="table table-tripped">
					<thead>
						<tr>
							<th style="min-width: 10px">ID</th>
							<th style="min-width: 150px">Name</th>
							<th style="min-width: 100px">Type Of</th>
							<th style="min-width: 200px">Created</th>
							<th style="min-width: 200px">Updated</th>
							<th style="min-width: 200px">Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach( $types as $index => $type )
						<tr>
							<td>{{$index + 1}}</td>
							<td>{{$type->name}}</td>
							<td>{{$type->type_of}}</td>
							<td>{{$type->created_at}}</td>
							<td>{{$type->updated_at}}</td>
							<td class="d-flex">
								<a class="btn btn-warning btn-sm" href="{{ route('type.edit', $type->id) }}"><i class="fa fa-edit"></i> Edit</a>
									&nbsp;
								<form action="{{ route('type.destroy', $type->id) }}" method="post">
									@csrf
									@method('delete')
									<button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Destroy</button>
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