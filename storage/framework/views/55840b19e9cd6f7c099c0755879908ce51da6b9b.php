<?php $__env->startSection('header'); ?>
<meta http-equiv="refresh" content="5">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body'); ?>
<div class="">
	<div class="row">
		<div class="col">
			<p><i class="fa fa-angle-right" style="padding-top: 2px;"></i> Expense Records </p>
		</div>
	</div>
	<br>
	<div class="row animated bounceInLeft">
		<div class="col text-right">
			<a class="btn btn-success btn-sm" href="<?php echo e(route('expense.create')); ?>"><i class="fa fa-plus"></i> Create</a>
		</div>
	</div>
	<br>
	<div class="row animated fadeIn">
		<div class="col">
			<div class="table-responsive">
				<table class="table table-tripped">
					<thead>
						<tr>
							<th style="min-width: 15px">ID</th>
							<th style="min-width: 200px">Name</th>
							<th style="min-width: 150px">Type</th>
							<th style="min-width: 50px">Amount</th>
							<th style="min-width: 200px">Date</th>
							<th style="min-width: 200px">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php $__currentLoopData = $expense; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ex): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<tr>
								<td><?php echo e($ex->id); ?></td>
								<td><?php echo e($ex->name); ?></td>
								<?php if(!empty($ex->getType)): ?>
								<td><?php echo e($ex->getType->name); ?></td>
								<?php else: ?>
								<td>NULL</td>
								<?php endif; ?>
								<td>$.<?php echo e($ex->amount); ?></td>
								<td><?php echo e($ex->created_at); ?></td>
								<td class="d-flex">
									<a class="btn btn-success btn-sm" href="<?php echo e(route('expense.edit', $ex->id)); ?>"><i class="fa fa-edit"></i> Edit</a>
									&nbsp;
									<form action="<?php echo e(route('expense.destroy', $ex->id)); ?>" method="post">
										<?php echo csrf_field(); ?>
										<?php echo method_field('delete'); ?>
									<button type="submit" class="btn btn-danger btn-sm" href="<?php echo e(route('expense.show', $ex->id)); ?>"><i class="fa fa-trash"></i> Destroy</button>
									</form>
								</td>
							</tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>