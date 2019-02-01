<?php $__env->startSection('header'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('body'); ?>
<div class="">
	<br>
	<div class="row animated bounceInLeft">
		<div class="col text-right">
			<a class="btn btn-success btn-sm" href="<?php echo e(route('type.create')); ?>"><i class="fa fa-plus"></i> Create</a>
		</div>
	</div>
	<br>
	<div class="row animated fadeIn">
		<div class="col">
			<div class="table-responsive">
				<table class="table table-tripped">
					<thead>
						<tr>
							<th style="min-width: 10px">ID</th>
							<th style="min-width: 150px">Name</th>
							<th style="min-width: 100px">Type Of</th>
							<th style="min-width: 200px">Created</th>
							<th style="min-width: 200px">Updated</th>
							<th style="min-width: 200px">Action</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>1</td>
							<td>Salary</td>
							<td>Income</td>
							<td>2019-01-31</td>
							<td>2019-01-31</td>
							<td></td>
						</tr>
						<tr>
							<td>2</td>
							<td>Food</td>
							<td>Expense</td>
							<td>2019-01-31</td>
							<td>2019-01-31</td>
							<td></td>
						</tr>
						<?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr>
							<td><?php echo e($index + 3); ?></td>
							<td><?php echo e($type->name); ?></td>
							<td><?php echo e($type->type_of); ?></td>
							<td><?php echo e($type->created_at); ?></td>
							<td><?php echo e($type->updated_at); ?></td>
							<td class="d-flex">
								<a class="btn btn-warning btn-sm" href="<?php echo e(route('type.edit', $type->id)); ?>"><i class="fa fa-edit"></i> Edit</a>
									&nbsp;
								<form action="<?php echo e(route('type.destroy', $type->id)); ?>" method="post">
									<?php echo csrf_field(); ?>
									<?php echo method_field('delete'); ?>
									<button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Destroy</button>
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