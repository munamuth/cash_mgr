<!DOCTYPE html>
<html>
<head>
	<title>Cash Management</title>
	<meta http-equiv="refresh" content="30">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' />
	<link rel="stylesheet" type="text/css" href="{{ url('/public/asset/animate.css/animate.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ url('/public/asset/bootstrap/css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ url('/public/asset/fontawesome/css/all.min.css') }}">

	<script type="text/javascript" src="{{ url('/public/asset/jquery/jquery-3.3.1.js') }}"></script>
	<script type="text/javascript" src="{{ url('/public/asset/bootstrap/js/bootstrap.min.js') }}"></script>
	<script type="text/javascript" src="{{ url('/public/asset/fontawesome/js/all.min.js') }}"></script>
	<style type="text/css">
		body{
			background-image: url("{{ url('/public/asset/logo/1.jpg') }}");
		}
		input::placeholder {
		  color: white!important;
		  font-size: 10px;
		}
		input{
			color: white!important;
			font-weight: bold!important;
			font-size: 14px;
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-12 col-sm-4 m-auto">
				<div  style="margin-top: calc((100vh)/6)"></div>
				<div class="form-group text-center pt-5">
					{{session('status')}}
				</div>
				<div class="card" style="background: #111fff11;">
					<div class="card-header text-light font-weight-bold"><i class="fa fa-user"></i> Login</div>
					<form action="{{ route('user.doLogin') }}" method="post" autocomplete="off">
						@csrf
						<div class="card-body">
							<div class="row form-group">
								<!-- <div class="col-12 col-sm-4">
									<label class="text-light font-weight-bold">Username</label>
								</div> -->
								<div class="col-12 col-sm-12 m-auto" >
									<input type="text" name="username" class="form-control" placeholder="Username" style="background: transparent;border-radius: 0;border: none;border-bottom: dotted 1px white;">
								</div>
							</div>
							<div class="row form-group">
								<!-- <div class="col-12 col-sm-4">
									<label class="text-light font-weight-bold">Password</label>
								</div> -->
								<div class="col-12 col-sm-12 m-auto">
									<input type="password" name="password" class="form-control" placeholder="Password" style="background: transparent;border-radius: 0;border: none;border-bottom: dotted 1px white;">
								</div>

							</div>

							<div class="row form-group">
								<div class="col-12">
									<input type="checkbox" name="remember_me"> <span class="text-light font-weight-bold">Remember Me</span>
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