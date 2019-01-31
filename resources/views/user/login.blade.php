<!DOCTYPE html>
<html>
<head>
	<title>Cash Management</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' />
	<link rel="stylesheet" type="text/css" href="{{ url('/public/asset/animate.css/animate.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ url('/public/asset/bootstrap/css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ url('/public/asset/fontawesome/css/all.min.css') }}">

	<script type="text/javascript" src="{{ url('/public/asset/jquery/jquery-3.3.1.js') }}"></script>
	<script type="text/javascript" src="{{ url('/public/asset/bootstrap/js/bootstrap.min.js') }}"></script>
	<script type="text/javascript" src="{{ url('/public/asset/fontawesome/js/all.min.js') }}"></script>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-12 col-sm-4 m-auto">
				<div  style="margin-top: calc((100vh)/6)"></div>
				<div class="form-group text-center pt-5">
					{{session('status')}}
				</div>
				<div class="card">
					<div class="card-header bg-secondary b-success"><i class="fa fa-user"></i> Login</div>
					<form action="{{ route('user.doLogin') }}" method="post">
						@csrf
						<div class="card-body bg-warning">
							<div class="row form-group">
								<div class="col-12 col-sm-4">
									<label>Username</label>
								</div>
								<div class="col-12 col-sm-8">
									<input type="text" name="username" class="form-control form-control-sm" placeholder="Username">
								</div>
							</div>
							<div class="row form-group">
								<div class="col-12 col-sm-4">
									<label>Password</label>
								</div>
								<div class="col-12 col-sm-8">
									<input type="text" name="password" class="form-control form-control-sm" placeholder="Password">
								</div>
							</div>
							<div class="row">
								<div class="col text-right">
									<button type="submit" class="btn btn-success btn-sm"><i class="fa fa-sign-in-alt"></i> Login</button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>