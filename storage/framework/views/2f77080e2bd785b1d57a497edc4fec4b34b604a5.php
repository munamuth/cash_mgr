<?php $__env->startSection('header'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('body'); ?>
	<div class="row">
		<div class="col">
			<p><i class="fa fa-angle-right" style="padding-top: 2px;"></i> <?php echo e(trans('lang.income_record')); ?> / <?php echo e(trans('lang.new_income')); ?></p>
		</div>
	</div>
	<div class="row">
		<div class="col">
			
			<form action="<?php echo e(route('income.store', $local)); ?>" method="post" enctype="multipart/form-data" autocomplete="off">
				<?php echo csrf_field(); ?>
				<?php echo method_field('post'); ?>
				<div class="row">
					<div class="col-12 col-sm-12 col-md-10 col-lg-6 m-auto">
						<div class="card animated zoomIn">
							<div class="card-header">
								<?php echo e(trans('lang.new_income')); ?>

								<a class="close" href="<?php echo e(route('income.index', $local)); ?>">
						          <span aria-hidden="true">&times;</span>
						        </a>
							</div>
							<div class="card-body">
								<div class="form-group row">
									<div class="col-12 col-sm-6"><?php echo e(trans('lang.date')); ?></div>
									<div class="col-12 col-sm-6"><input class="form-control form-control-sm datepicker" type="text" name="create"></div>
								</div>
								<div class="form-group row">
									<div class="col-12 col-sm-6"><?php echo e(trans('lang.income_name')); ?></div>
									<div class="col-12 col-sm-6"><input class="form-control form-control-sm" type="text" name="name"></div>
								</div>
								<div class="form-group row">
									<div class="col-12 col-sm-6"><?php echo e(trans('lang.income_type')); ?></div>
									<div class="col-12 col-sm-6">
										<select class="form-control form-control-sm" name="type">
											<option value="1">Salary</option>
											<?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<option value="<?php echo e($type->id); ?>"><?php echo e($type->name); ?></option>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										</select>
										
									</div>
								</div>
								<div class="form-group row">
									<div class="col-12 col-sm-6"><?php echo e(trans('lang.amount')); ?></div>
									<div class="col-12 col-sm-6"><input class="form-control form-control-sm" type="text" name="amount"></div>
								</div>
								<div class="text-right">
									<button type="submit" class="btn btn-success btn-sm"><i class="fa fa-download"></i> <?php echo e(trans('lang.save')); ?></button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>