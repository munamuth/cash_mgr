<!DOCTYPE html>
<html>
<head><meta name="google-site-verification" content="t7Wnf8LhN7oeZe0Q7B2zBeCXYnYhaewxitVxQoroMMo" />
	<title>Cash Management</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
	<link rel="stylesheet" type="text/css" href="{{ url('/public/asset/jquery-ui/jquery-ui.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ url('/public/asset/animate.css/animate.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ url('/public/asset/bootstrap/css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ url('/public/asset/fontawesome/css/font-awesome.min.css') }}">

	<script type="text/javascript" src="{{ url('/public/asset/jquery/jquery-3.3.1.js') }}"></script>
	<script type="text/javascript" src="{{ url('/public/asset/jquery-ui/jquery-ui.min.js') }}"></script>
	<script type="text/javascript" src="{{ url('/public/asset/bootstrap/js/bootstrap.min.js') }}"></script>

	<style type="text/css">
		body{
			height: 100vh;
			overflow: hidden;
		}
		table, table td{

		}
		#second-row, #second-row>div, #second-row>div>ul.menu{
			height: calc(100vh - 40px);
		}
		ul.menu, ul.submenu{
			padding: 0;
			list-style: none;
		}
		ul.menu:hover{			
			overflow: overlay;
		}
		ul.menu li{
			width: 100%;
			float: left;
		}
		ul.menu li a {
			width: 100%;
			float: left;
			padding: 15px 20px 15px 15px;
			text-decoration: none;
			color: #fff;
		}
		ul.menu li a:hover{
			background: #123;
		}
		ul.submenu{
			display: none;
		}
		ul.submenu li a{
			padding-left: 30px;
		}
		.message{
				display: none;
				position: absolute;
				z-index: 100;
				height: auto;
				width: 250px;
				position: absolute;
				left: 50%;
				margin-left: -125px;
				top: 65px;
				margin-top: 0px;
			}

		@media screen and (max-width: 767px){
			.message{
				height: auto;
				width: 60%;
				position: absolute;
				left: 50%;
				margin-left: -30%;
				top: initial;
				bottom: 0;
			}
			.message .alert{
				border-radius: 30px;
			}
		}

		*{
			border-radius: 0!important;
		}
		.card-header{
			background: #28a745!important;
			color: #fff;
			font-weight: bolder;
			font-size: 20px;
			padding: 5px 15px;
		}
		.card-footer{
			color: #fff;
			font-weight: bolder;
			font-size: 20px;
			padding: 5px 15px;
		}
	</style>
	@yield('header')
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col pt-2 pb-2 text-right">
				<a href="{{ url('/kh') }}" class="btn btn-warning btn-sm">ខ្មែរ</a>
				<a href="{{ url('/en') }}" class="btn btn-warning btn-sm">Egnlish</a>
			</div>
		</div>	
	</div>
	<div class="container-fluid">
		
		<div class="row  bg-primary" id="first-row">
			<div class="col-12 col-sm-12 col-md-5 col-lg-4 col-xl-3 p-3 d-flex">
				<button class="btn btn-success btn-sm text-light d-block d-md-none" id="btnMenu"><i class="fa fa-bars"></i></button>
				&nbsp;
				<p class="h4 text-light m-0">
				{{ trans('lang.cash_management_system') }}
				</p>
			</div>
			<div class="col-12 col-sm-12 col-md-7 col-lg-8 col-xl-9 p-3 text-right float-righ d-none d-md-block">

					<div class="row">
						<div class="col">
							<a class="font-weight-bold text-light">{{Auth::user()->name}}</a>
							<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
							    {{ csrf_field() }}
							</form>
						</div>
					</div>

			</div>
		</div>

		<div class="row" id="second-row">
			<div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-3 bg-secondary p-0 d-none d-md-block" id="menu">
				<style type="text/css">
					
				</style>
				<ul class="menu">
					<li><a class="font-weight-bold text-light" href="{{ url('/') }}"><i class="fa fa-home"></i> {{ trans('lang.home') }} </a></li>
					<li class="hasub"><a class="font-weight-bold text-light" href="#"><i class="fa fa-money"></i> {{ trans('lang.cash_management') }}<span class="float-right"><i class="fa fa-angle-up fa-angle-down symbol"></i></span></a>
						<ul class="submenu hide">
							<li><a class="font-weight-bold text-light" href="{{ route('income.index', $local ) }}"><i class="fa fa-angle-right"></i> {{ trans('lang.income') }} <span class="float-right"></span></a></li>
							<li><a class="font-weight-bold text-light" href="{{ route('expense.index', $local ) }}"><i class="fa fa-angle-right"></i> {{ trans('lang.expense') }} <span class="float-right"></span></a></li>
							<li><a class="font-weight-bold text-light" href="{{ route('type.index', $local) }}"><i class="fa fa-angle-right"></i> {{ trans('lang.type') }} <span class="float-right"></span></a></li>
						</ul>
					</li>
					<li class="hasub"><a class="font-weight-bold text-light" href="#"><i class="fa fa-credit-card"></i> {{ trans('lang.tongtin_management') }} <span class="float-right"><i class="fa fa-angle-up fa-angle-down symbol"></i></span></a>
						<ul class="submenu hide">
							<li><a class="font-weight-bold text-light" href="{{ route('tongtins.index', $local) }}"><i class="fa fa-angle-right"></i> {{ trans('lang.tongtin') }} <span class="float-right"></span></a></li>
							<li><a class="font-weight-bold text-light" href="{{ route('record.index', $local ) }}"><i class="fa fa-angle-right"></i> {{ trans('lang.payment_record') }} <span class="float-right"></span></a></li>
							<li><a class="font-weight-bold text-light" href="{{ route('type.index', $local ) }}"><i class="fa fa-angle-right"></i> {{ trans('lang.payment_type') }} <span class="float-right"></span></a></li>
							<li><a class="font-weight-bold text-light" href="{{ route('player_list.index', $local ) }}"><i class="fa fa-angle-right"></i> {{ trans('lang.player_list') }} <span class="float-right"></span></a></li>
							<li><a class="font-weight-bold text-light" href="{{ route('player.index', $local ) }}"><i class="fa fa-angle-right"></i> {{ trans('lang.player') }}<span class="float-right"></span></a></li>
						</ul>
					</li>
					
					<li><a class="font-weight-bold text-light" href="{{ route('users.index', $local) }}"><i class="fa fa-users"></i> {{ trans('lang.users') }} </a></li>
					<li><a class="font-weight-bold text-light" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="text-light"><i class="fa fa-sign-out"></i> {{ trans('lang.logout') }}</a></li>
					
					

					

				</ul>
			</div>
			<div class="col-12 col-sm-12 col-md-7 col-lg-8 col-xl-9 overflow-auto" id="container">
				<br>
				@yield('body')
				<br>
			</div>
		</div>

	</div>
	<div class="message">
		<div class="alert alert-secondary text-center" role="alert">
		 	<p class="m-0 status">{{session('status')}}</p>
		</div>
	</div>


	<script type="text/javascript">
		$('#btnMenu').click( function(){
			$("#menu").toggleClass('d-none')
			$("#container").toggleClass("d-none fade");
		})

		if( $('.status').text() != "" ){
			$('.message').slideDown();
		}
		setInterval( function(){
			$('.message').slideUp()
		}, 2500);


		 $( function() {
		    $( ".datepicker" ).datepicker({ dateFormat: 'dd/mm/yy' });
		  } );


		 $('.hasub').click( function(){
		 	$(this).find('.submenu').fadeToggle(function(){
		 		$(this).closest('.hasub').toggleClass("bg-success")
		 	});
		 	$(this).find('.symbol').toggleClass('fa-angle-down')
		 });
	</script>
	@yield('script')
</body>
</html>