<?php $__env->startSection('header'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('body'); ?>
	<div class="row m-auto">
		<div class="col-12 col-sm-6 col-md-4">
			<div class="card">
				<div class="card-header">
					Change Password of <?php echo e($user->name); ?>

				</div>
				<form action="<?php echo e(route('user.update.password', $user->id)); ?>" method="post">
					<?php echo csrf_field(); ?>
				<div class="card-body">
					<div class="row form-group">
						<div class="col-12 col-sm-4">
						<label>New Password</label>
						</div>
						<div class="col-12 col-sm-8">
						<input type="password" name="password">
						</div>
					</div>
					<div class="row form-group">
						<div class="col-12 col-sm-4">
						<label>Confirm New Password</label>
						</div>
						<div class="col-12 col-sm-8">
						<input type="password" name="password">
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>