@extends('master')

@section('header')

@endsection

@section('body')
<div class="">
	<br>
	<div class="row animated fadeIn">
		<div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-6 m-auto">
			<div class="card animated zoomIn">
				<div class="card-header">
					New User
					<a class="close" href="{{ route('type.index') }}">
			          <span aria-hidden="true">&times;</span>
			        </a>
				</div>
				<form action="{{ route('users.store') }}" method="post" enctype="multipart/form-data">
					@csrf
					<div class="card-body">

						<div class="row form-group">
							<div class="col-12 col-sm-4">
								<LABEL>Name</LABEL>
							</div>
							<div class="col-12 col-sm-8">
								<input type="text" name="name" class="form-control form-control-sm">
							</div>
						</div>

						<div class="row form-group">
							<div class="col-12 col-sm-4">
								<LABEL>Login Name</LABEL>
							</div>
							<div class="col-12 col-sm-8">
								<input type="text" name="email" class="form-control form-control-sm">
							</div>
						</div>

						<div class="row form-group">
							<div class="col-12 col-sm-4">
								<LABEL>Role</LABEL>
							</div>
							<div class="col-12 col-sm-8">
								<select name="role" class="form-control form-control-sm">
									<option value="2">User</option>
									<option value="1">Admin</option>
								</select>
							</div>
						</div>

						<div class="row form-group">
							<div class="col-12 col-sm-4">
								<LABEL>Password</LABEL>
							</div>
							<div class="col-12 col-sm-8">
								<input type="password" name="password" class="form-control form-control-sm">
							</div>
						</div>

						<div class="row form-group">
							<div class="col-12 col-sm-12">
								<div class="text-right">
									<button type="submit" class="btn btn-success btn-sm"><i class="fa fa-download"></i> Save</button>
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