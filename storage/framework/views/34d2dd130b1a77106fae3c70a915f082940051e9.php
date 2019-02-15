<?php $__env->startSection('header'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('body'); ?>
<div class="">
	<div class="row">
		<div class="col">
			<p><i class="fa fa-angle-right" style="padding-top: 2px;"></i> Income Records </p>
		</div>
	</div>
	<br>
	<div class="row animated bounceInLeft">

		<div class="col-9 col-sm-6">Your Income This Month: <span class="h4 text-success">៛ <?php echo e(number_format($total)); ?></span></div>
		<div class="col-3 col-sm-6 text-right">
			<a class="btn btn-success btn-sm" href="<?php echo e(route('income.create')); ?>"><i class="fa fa-plus"></i> Create</a>
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
							<?php if(Auth::user()->role == 1): ?>
							<th style="min-width: 150px">User Name</th>
							<?php endif; ?>
							<th style="min-width: 150px">Type</th>
							<th style="min-width: 50px">Amount</th>
							<th style="min-width: 200px">Date</th>
							<th style="min-width: 200px">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php $__currentLoopData = $income; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $in): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<tr>
								<td><?php echo e($index+1); ?></td>
								<td><?php echo e($in->name); ?></td>
								<?php if(Auth::user()->role == 1): ?>
								<th><?php echo e($in->getUserName->name); ?></th>
								<?php endif; ?>
								<?php if(!empty($in->getType)): ?>
								<td><?php echo e($in->getType->name); ?></td>
								<?php else: ?>
								<td>NULL</td>
								<?php endif; ?>
								<td class="text-right text-success font-weight-bold">៛​​ <span class="text-right"><?php echo e(number_format($in->amount)); ?></span></td>
								<td><?php echo e($in->created_at->format('d/m/Y')); ?></td>
								<td class="d-flex">
									<a class="btn btn-success btn-sm" href="<?php echo e(route('income.edit', $in->id)); ?>"><i class="fa fa-edit"></i> Edit</a>
									&nbsp;
									<form action="<?php echo e(route('income.destroy', $in->id)); ?>" method="post">
										<?php echo csrf_field(); ?>
										<?php echo method_field('delete'); ?>
									<button type="submit" class="btn btn-danger btn-sm" href="<?php echo e(route('income.show', $in->id)); ?>"><i class="fa fa-trash"></i> Destroy</button>
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