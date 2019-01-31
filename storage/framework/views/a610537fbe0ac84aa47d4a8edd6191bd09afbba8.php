<?php $__env->startSection('header'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('body'); ?>
		<div class="row pb-1">
			<div class="col">
				<div class="text-right">
					<a class="btn btn-success btn-sm" href="<?php echo e(route('users.create')); ?>"><i class="fa fa-plus"></i> Create</a>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col">
				<div class="table-responsive">
					<table class="table table-stripped">
						<thead>
							<tr>
								<th style="min-width: 10px;">ID</th>
								<th style="min-width: 150px;">Name</th>
								<th style="min-width: 150px;">Username</th>
								<th style="min-width: 200px;">Created</th>
								<th style="min-width: 200px;">Updated</th>
								<th style="min-width: 300px;">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  								<tr>
  									<td><?php echo e($user->id); ?></td>
  									<td><?php echo e($user->name); ?></td>
  									<td><?php echo e($user->email); ?></td>
  									<td><?php echo e($user->created_at); ?></td>
  									<td><?php echo e($user->updated_at); ?></td>
  									<td class="d-flex">
  										<a class="btn btn-warning btn-sm" href="<?php echo e(route('user.edit.password', $user->id)); ?>"><i class="fa fa-edit"></i> Change Password</a>
  										&nbsp;
  										<button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Destroy</button>
  									</td>
  								</tr>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>