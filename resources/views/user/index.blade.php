@extends('master')

@section('header')

@endsection

@section('body')
		<div class="row pb-1">
			<div class="col">
				<div class="text-right">
					@if( Auth::User()->role == 1)
					<a class="btn btn-success btn-sm" href="{{ route('users.create', $local) }}"><i class="fa fa-plus"></i> {{ trans('lang.create') }}</a>
					@endif
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col">
				<div class="table-responsive">
					<table class="table table-stripped">
						<thead>
							<tr>
								<th style="min-width: 10px;">{{ trans('lang.no') }}</th>
								<th style="min-width: 150px;">{{ trans('lang.name') }}</th>
								<th style="min-width: 150px;">{{ trans('lang.username') }}</th>
								<th style="min-width: 150px;">{{ trans('lang.role') }}</th>
								<th style="min-width: 200px;">{{ trans('lang.created') }}</th>
								<th style="min-width: 200px;">{{ trans('lang.updated') }}</th>
								<th style="min-width: 300px;">{{ trans('lang.action') }}</th>
							</tr>
						</thead>
						<tbody>
							@foreach( $users as $user )
  								<tr>
  									<td>{{ $user->id }}</td>
  									<td>{{ $user->name }}</td>
  									<td>{{ $user->email }}</td>
  									@if( $user->role == 1 )
  									<td>Admin</td>
  									@else
  									<td>User</td>
  									@endif
  									<td>{{ $user->created_at }}</td>
  									<td>{{ $user->updated_at }}</td>
  									<td class="d-flex">
  										<a class="btn btn-info btn-sm" href="{{ route('user.edit.password', [$local, $user->id]) }}"><i class="fa fa-edit"></i> {{ trans('lang.change_password') }}</a>
  									
  										<a class="btn btn-warning btn-sm" href="{{ route('users.edit', [$local, $user->id]) }}"><i class="fa fa-edit"></i> {{ trans('lang.edit') }}</a>
  									
  										<button class="btn btn-danger btn-sm" onclick="btnDestory_click({{$user->id}})"><i class="fa fa-trash"></i> {{ trans('lang.destroy') }}</button>
  										
  									</td>
  								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<form method="post" id="form-destroy">@csrf @method("delete")</form>
		<script type="text/javascript">
			btnDestory_click(id){
				var answer = confirm("Are you sure?");
				if( answer ){
					$('#form-destroy').prop("action", "/users/"+ id);
					$('#form-destroy').submit();
				}
			}
		</script>
@endsection