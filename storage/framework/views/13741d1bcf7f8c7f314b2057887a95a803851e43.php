<?php $__env->startSection('header'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('body'); ?>
<div class="">
	<br>
	<div class="row animated fadeIn">
		<div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-6 m-auto">
			<div class="card animated zoomIn">
				<div class="card-header bg-success text-light">
					<?php echo e(trans('lang.create')); ?>

					<a class="close" href="<?php echo e(route('users.index', $local)); ?>">
			          <span aria-hidden="true">&times;</span>
			        </a>
				</div>
				<form action="<?php echo e(route('users.store', $local)); ?>" method="post" enctype="multipart/form-data">
					<?php echo csrf_field(); ?>
					<div class="card-body">

						<div class="row form-group">
							<div class="col-12 col-sm-4">
								<LABEL><?php echo e(trans('lang.name')); ?></LABEL>
							</div>
							<div class="col-12 col-sm-8">
								<input type="text" name="name" class="form-control form-control-sm">
							</div>
						</div>

						<div class="row form-group">
							<div class="col-12 col-sm-4">
								<LABEL><?php echo e(trans('lang.username')); ?></LABEL>
							</div>
							<div class="col-12 col-sm-8">
								<input type="text" name="email" class="form-control form-control-sm">
							</div>
						</div>

						<div class="row form-group">
							<div class="col-12 col-sm-4">
								<LABEL><?php echo e(trans('lang.phone')); ?></LABEL>
							</div>
							<div class="col-12 col-sm-8">
								<input type="text" name="phone" class="form-control form-control-sm">
							</div>
						</div>

						<div class="row form-group">
							<div class="col-12 col-sm-4">
								<LABEL><?php echo e(trans('lang.role')); ?></LABEL>
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
								<LABEL><?php echo e(trans('lang.password')); ?></LABEL>
							</div>
							<div class="col-12 col-sm-8">
								<input type="password" name="password" class="form-control form-control-sm">
							</div>
						</div>

						<div class="row form-group">
							<div class="col-12 col-sm-12">
								<div class="text-right">
									<button type="submit" class="btn btn-success btn-sm"><i class="fa fa-download"></i> <?php echo e(trans('lang.save')); ?></button>
								</div>
							</div>
						</div>

					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>