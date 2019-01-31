<?php $__env->startSection('header'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('body'); ?>
	<div class="row">
		<div class="col">
			
			<form action="<?php echo e(route('expense.update', $expense->id)); ?>" method="post" enctype="multipart/form-data">
				<?php echo csrf_field(); ?>
				<?php echo method_field('put'); ?>
				<div class="row">
					<div class="col-12 col-sm-12 col-md-10 col-lg-6 m-auto">
						<div class="card animated zoomIn">
							<div class="card-header">
								New Income
								<a class="close" href="<?php echo e(route('expense.index')); ?>">
						          <span aria-hidden="true">&times;</span>
						        </a>
							</div>
							<div class="card-body">
								<div class="form-group row">
									<div class="col-12 col-sm-6">Income Name</div>
									<div class="col-12 col-sm-6">
										<input class="form-control form-control-sm" type="text" name="name" value="<?php echo e($expense->name); ?>">
									</div>
								</div>
								<div class="form-group row">
									<div class="col-12 col-sm-6">Income type</div>
									<div class="col-12 col-sm-6">
										<select class="form-control form-control-sm" name="type" >
											<?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<?php if( $expense->type == $type->id ): ?>
												<option value="<?php echo e($type->id); ?>" selected><?php echo e($type->name); ?></option>
												<?php else: ?> 
												<option value="<?php echo e($type->id); ?>"><?php echo e($type->name); ?></option>
												<?php endif; ?>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										</select>
										
									</div>
								</div>
								<div class="form-group row">
									<div class="col-12 col-sm-6">Amount</div>
									<div class="col-12 col-sm-6"><input class="form-control form-control-sm" type="text" name="amount" value="<?php echo e($expense->amount); ?>"></div>
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