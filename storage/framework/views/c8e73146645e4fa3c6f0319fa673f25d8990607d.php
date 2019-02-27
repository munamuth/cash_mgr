<?php $__env->startSection('header'); ?>
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
		<div class="col-12 col-sm-9">
			<form class="form-inline" action="<?php echo e(url('expense/search', $local)); ?>" method="get">
				
					<label>Type </label>
					<select class="form-control form-control-sm">
						<option><?php echo e(trans('lang.select_type')); ?></option>
					</select>
					<button class="btn btn-success btn-sm"><?php echo e(trans('lang.search')); ?></button>
			</form>
		</div>
		<div class="col-12 col-sm-3 text-right">
			<a class="btn btn-success btn-sm" href="<?php echo e(route('expense.create', $local)); ?>"><i class="fa fa-plus"></i> <?php echo e(trans('lang.create')); ?></a>

		</div>
		<div class="col-12 col-sm-12 text-right mt-3">Your Expense This Month: <span class="h4 text-danger">៛ <?php echo e(number_format($total)); ?></span></div>
	</div>
	<br>
	<div class="row animated fadeIn">
		<div class="col">
			<div class="table-responsive">
				<table class="table table-tripped">
					<thead>
						<tr>
							<th style="min-width: 15px"><?php echo e(trans('lang.no')); ?></th>
							<th style="min-width: 200px"><?php echo e(trans('lang.name')); ?></th>
							<?php if( Auth::user()->role == 1 ): ?>
							<th style="min-width: 200px"><?php echo e(trans('lang.username')); ?></th>
							<?php endif; ?>
							<th style="min-width: 150px"><?php echo e(trans('lang.type')); ?></th>
							<th style="min-width: 150px"><?php echo e(trans('lang.amount')); ?></th>
							<th style="min-width: 200px"><?php echo e(trans('lang.date')); ?></th>
							<th style="min-width: 200px"><?php echo e(trans('lang.action')); ?></th>
						</tr>
					</thead>
					<tbody>
						<?php $__currentLoopData = $expense; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $ex): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<tr>
								<td><?php echo e($index+1); ?></td>
								<td><?php echo e($ex->name); ?></td>
								<?php if(Auth::user()->role == 1): ?>
								<th><?php echo e($ex->getUserName->name); ?></th>
								<?php endif; ?>
								<?php if(!empty($ex->getType)): ?>
								<td><?php echo e($ex->getType->name); ?></td>
								<?php else: ?>
								<td>NULL</td>
								<?php endif; ?>
								<td class="text-danger text-right font-weight-bold">៛ <?php echo e(number_format($ex->amount)); ?></td>
								<td><?php echo e($ex->created_at->format('d/m/Y')); ?></td>
								<td class="d-flex">
									<a class="btn btn-success btn-sm" href="<?php echo e(route('expense.edit', [$local, $ex->id])); ?>"><i class="fa fa-edit"></i> Edit</a>
									&nbsp;
									<form action="<?php echo e(route('expense.destroy', [$local, $ex->id])); ?>" method="post">
										<?php echo csrf_field(); ?>
										<?php echo method_field('delete'); ?>
									<button type="submit" class="btn btn-danger btn-sm" href="<?php echo e(route('expense.show', [$local, $ex->id])); ?>"><i class="fa fa-trash"></i> Destroy</button>
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