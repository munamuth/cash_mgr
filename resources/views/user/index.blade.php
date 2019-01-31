@extends('master')

@section('header')

@endsection

@section('body')
		<div class="row pb-1">
			<div class="col">
				<div class="text-right">
					<a class="btn btn-success btn-sm" href="{{ route('users.create') }}"><i class="fa fa-plus"></i> Create</a>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col">
				<div class="table-responsive">
					<table class="table table-stripped">
						<thead>
							<tr>
								<th style="min-width: 10px;">ID</th>
								<th style="min-width: 150px;">Name</th>
								<th style="min-width: 150px;">Username</th>
								<th style="min-width: 200px;">Created</th>
								<th style="min-width: 200px;">Updated</th>
								<th style="min-width: 300px;">Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach( $users as $user )
  								<tr>
  									<td>{{ $user->id }}</td>
  									<td>{{ $user->name }}</td>
  									<td>{{ $user->email }}</td>
  									<td>{{ $user->created_at }}</td>
  									<td>{{ $user->updated_at }}</td>
  									<td class="d-flex">
  										<a class="btn btn-warning btn-sm" href="{{ route('user.edit.password', $user->id) }}"><i class="fa fa-edit"></i> Change Password</a>
  										&nbsp;
  										<button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Destroy</button>
  									</td>
  								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>

@endsection