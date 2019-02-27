<?php $__env->startSection('header'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('body'); ?>
	<div class="row">
		<div class="col">
			<p><i class="fa fa-angle-right" style="padding-top: 2px;"></i> Expense Record / Create New</p>
		</div>
	</div>
	<div class="row">
		<div class="col">
			
			<form action="<?php echo e(route('expense.store', $local)); ?>" method="post" enctype="multipart/form-data" autocomplete="off">
				<?php echo csrf_field(); ?>
				<?php echo method_field('post'); ?>
				<div class="row">
					<div class="col-12 col-sm-12 col-md-10 col-lg-6 m-auto">
						<div class="card animated zoomIn">
							<div class="card-header">
								<?php echo e(trans('lang.new_expense')); ?>

								<a class="close" href="<?php echo e(route('expense.index', $local)); ?>">
						          <span aria-hidden="true">&times;</span>
						        </a>
							</div>
							<div class="card-body">
								<div class="form-group row">
									<div class="col-12 col-sm-6">Date</div>
									<div class="col-12 col-sm-6"><input class="form-control form-control-sm datepicker" type="text" name="create"></div>
								</div>
								<div class="form-group row">
									<div class="col-12 col-sm-6">Expense Name</div>
									<div class="col-12 col-sm-6"><input class="form-control form-control-sm" type="text" name="name"></div>
								</div>
								<div class="form-group row">
									<div class="col-12 col-sm-6">Expense type</div>
									<div class="col-12 col-sm-6">
										<select class="form-control form-control-sm" name="type">
											<option value="2">Food</option>
											<?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<option value="<?php echo e($type->id); ?>"><?php echo e($type->name); ?></option>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										</select>
										
									</div>
								</div>
								<div class="form-group row">
									<div class="col-12 col-sm-6">Amount</div>
									<div class="col-12 col-sm-6"><input class="form-control form-control-sm" type="text" name="amount"></div>
								</div>
								<div class="text-right">
									<button type="submit" class="btn btn-success btn-sm"><i class="fa fa-download"></i> Save</button>
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