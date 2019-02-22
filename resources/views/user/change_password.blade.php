@extends('master')

@section('header')

@endsection

@section('body')
	<div class="row m-auto">
		<div class="col-12 col-sm-6 col-md-6">
			<div class="card">
				<div class="card-header">
					Change Password of {{$user->name}}
				</div>
				<form action="{{ route('user.update.password', $user->id) }}" method="post">
					@csrf
				<div class="card-body">
					<div class="row form-group">
						<div class="col-12 col-sm-5">
						<label>New Password</label>
						</div>
						<div class="col-12 col-sm-7">
						<input type="password" name="password" class="form-control form-control-sm" placeholder="Password">
						</div>
					</div>
					<div class="row form-group">
						<div class="col-12 col-sm-5">
						<label>Confirm New Password</label>
						</div>
						<div class="col-12 col-sm-7">
						<input type="password" name="password" class="form-control form-control-sm" placeholder="Confirm password">
						</div>
					</div>
					<div class="row form-group">
						<div class="col text-right">
							<button class="btn btn-success btn-sm"><i class="fa fa-download"></i> Save</button>
						</div>
					</div>
				</div>
				</form>
			</div>
		</div>
	</div>
@endsection