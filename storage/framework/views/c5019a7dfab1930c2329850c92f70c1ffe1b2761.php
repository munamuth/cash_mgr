<?php $__env->startSection('header'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('body'); ?>
		<div class="row pb-1">
			<div class="col">
				<div class="text-right">
					<?php if( Auth::User()->role == 1): ?>
					<a class="btn btn-success btn-sm" href="<?php echo e(route('users.create')); ?>"><i class="fa fa-plus"></i> Create</a>
					<?php endif; ?>
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
								<th style="min-width: 150px;">Role</th>
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
  									<?php if( $user->role == 1 ): ?>
  									<td>Admin</td>
  									<?php else: ?>
  									<td>User</td>
  									<?php endif; ?>
  									<td><?php echo e($user->created_at); ?></td>
  									<td><?php echo e($user->updated_at); ?></td>
  									<td class="d-flex">
  										<a class="btn btn-warning btn-sm" href="<?php echo e(route('user.edit.password', $user->id)); ?>"><i class="fa fa-edit"></i> Change Password</a>
  										&nbsp;
  										<a class="btn btn-warning btn-sm" href="<?php echo e(route('users.edit', $user->id)); ?>"><i class="fa fa-edit"></i> Edit</a>
  										&nbsp;
  										<button class="btn btn-danger btn-sm" onclick="btnDestory_click(<?php echo e($user->id); ?>)"><i class="fa fa-trash"></i> Destroy</button>
  										
  									</td>
  								</tr>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<form method="post" id="form-destroy"><?php echo csrf_field(); ?> <?php echo method_field("delete"); ?></form>
		<script type="text/javascript">
			btnDestory_click(id){
				var answer = confirm("Are you sure?");
				if( answer ){
					$('#form-destroy').prop("action", "/users/"+ id);
					$('#form-destroy').submit();
				}
			}
		</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>