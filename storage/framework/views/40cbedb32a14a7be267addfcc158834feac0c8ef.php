<!DOCTYPE html>
<html>
<head>
	<title>Cash Management</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
	<link rel="stylesheet" type="text/css" href="<?php echo e(url('/public/asset/animate.css/animate.css')); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo e(url('/public/asset/bootstrap/css/bootstrap.min.css')); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo e(url('/public/asset/fontawesome/css/all.min.css')); ?>">

	<script type="text/javascript" src="<?php echo e(url('/public/asset/jquery/jquery-3.3.1.js')); ?>"></script>
	<script type="text/javascript" src="<?php echo e(url('/public/asset/bootstrap/js/bootstrap.min.js')); ?>"></script>
	<script type="text/javascript" src="<?php echo e(url('/public/asset/fontawesome/js/all.min.js')); ?>"></script>

	<style type="text/css">
		body{
			height: 100vh;
			overflow: hidden;
		}
		#second-row, #second-row>div, #second-row>div>ul.menu{
			height: calc(100vh - 40px);
		}
		ul.menu{
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

		@media  screen and (max-width: 767px){
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
	</style>
	<?php echo $__env->yieldContent('header'); ?>
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col text-right">
				<button class="btn btn-link btn-sm">KH</button>
				<button class="btn btn-link btn-sm">EN</button>
			</div>
		</div>
		<div class="row  bg-primary" id="first-row">
			<div class="col-12 col-sm-12 col-md-5 col-lg-4 col-xl-3 p-3 border-right d-flex">
				<button class="btn btn-success btn-sm text-light d-block d-md-none" id="btnMenu"><i class="fa fa-bars"></i></button>
				&nbsp;
				<p class="h4 text-light m-0">
				Cash Management System
				</p>
			</div>
			<div class="col-12 col-sm-12 col-md-7 col-lg-8 col-xl-9 p-3 text-right float-righ d-none d-md-block">

					<div class="row">
						<div class="col">
							<a class="font-weight-bold text-light"><?php echo e(Auth::user()->name); ?></a>
							<form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
							    <?php echo e(csrf_field()); ?>

							</form>
						</div>
					</div>

			</div>
		</div>

		<div class="row" id="second-row">
			<div class="col-12 col-sm-12 col-md-5 col-lg-4 col-xl-3 bg-secondary p-0 d-none d-md-block" id="menu">
				<ul class="menu">
					<li><a class="font-weight-bold text-light" href="<?php echo e(url('/')); ?>"><i class="fa fa-home"></i> Home <span class="float-right"><i class="fa fa-angle-down"></i></span></a></li>
					<li><a class="font-weight-bold text-light" href="<?php echo e(url('/income')); ?>"><i class="fa fa-money-check-alt"></i> Income <span class="float-right"><i class="fa fa-angle-down"></i></span></a></li>
					<li><a class="font-weight-bold text-light" href="<?php echo e(url('/expense')); ?>"><i class="fa fa-money-bill-alt"></i> Expense <span class="float-right"><i class="fa fa-angle-down"></i></span></a></li>
					<li><a class="font-weight-bold text-light" href="<?php echo e(url('/type')); ?>"><i class="fa fa-project-diagram"></i> Types <span class="float-right"><i class="fa fa-angle-down"></i></span></a></li>
					<li><a class="font-weight-bold text-light" href="<?php echo e(url('/users')); ?>"><i class="fa fa-users"></i> Users <span class="float-right"><i class="fa fa-angle-down"></i></span></a></li>
					<li><a class="font-weight-bold text-light" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="text-light"><i class="fa fa-sign-out-alt"></i> Logout</a></li>

				</ul>
			</div>
			<div class="col-12 col-sm-12 col-md-7 col-lg-8 col-xl-9 overflow-auto" id="container">
				<br>
				<?php echo $__env->yieldContent('body'); ?>
				<br>
			</div>
		</div>

	</div>
	<div class="message">
		<div class="alert alert-secondary text-center" role="alert">
		 	<p class="m-0 status"><?php echo e(session('status')); ?></p>
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

	</script>
</body>
</html>