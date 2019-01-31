<?php $__env->startSection('header'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('body'); ?>
<div class="">
	<br>
	<div class="row animated fadeIn">
		<div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-4 m-auto">
			<div class="card animated zoomIn">
				<div class="card-header">
					New Type
					<a class="close" href="<?php echo e(route('type.index')); ?>">
			          <span aria-hidden="true">&times;</span>
			        </a>
				</div>
				<form action="<?php echo e(route('type.update', $type->id)); ?>" method="post" enctype="multipart/form-data">
					<?php echo csrf_field(); ?>
					<?php echo method_field('put'); ?>
					<div class="card-body">

						<div class="row form-group">
							<div class="col-12 col-sm-4">
								<LABEL>Name</LABEL>
							</div>
							<div class="col-12 col-sm-8">
								<input type="text" name="name" class="form-control form-control-sm" value="<?php echo e($type->name); ?>">
							</div>
						</div>

						<div class="row form-group">
							<div class="col-12 col-sm-4">
								<LABEL>Type Of</LABEL>
							</div>
							<div class="col-12 col-sm-8">
								<select name="type_of" class="form-control form-control-sm">
									<option value="Income">Income</option>
									<option value="Expense">Expense</option>
								</select>
							</div>
						</div>

						<div class="row form-group">
							<div class="col-12 col-sm-12">
								<div class="text-right">
									<button type="submit" class="btn btn-success btn-sm"><i class="fa fa-download"></i> Update</button>
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