<?php $__env->startSection('header'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('body'); ?>
		<div class="row pb-1">
			<div class="col">
				<div class="text-right">
					<?php if( Auth::User()->role == 1): ?>
					<a class="btn btn-success btn-sm" href="<?php echo e(route('users.create', $local)); ?>"><i class="fa fa-plus"></i> <?php echo e(trans('lang.create')); ?></a>
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
								<th style="min-width: 10px;"><?php echo e(trans('lang.no')); ?></th>
								<th style="min-width: 150px;"><?php echo e(trans('lang.name')); ?></th>
								<th style="min-width: 150px;"><?php echo e(trans('lang.username')); ?></th>
								<th style="min-width: 150px;"><?php echo e(trans('lang.role')); ?></th>
								<th style="min-width: 200px;"><?php echo e(trans('lang.created')); ?></th>
								<th style="min-width: 200px;"><?php echo e(trans('lang.updated')); ?></th>
								<th style="min-width: 300px;"><?php echo e(trans('lang.action')); ?></th>
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
  										<a class="btn btn-info btn-sm" href="<?php echo e(route('user.edit.password', [$local, $user->id])); ?>"><i class="fa fa-edit"></i> <?php echo e(trans('lang.change_password')); ?></a>
  									
  										<a class="btn btn-warning btn-sm" href="<?php echo e(route('users.edit', [$local, $user->id])); ?>"><i class="fa fa-edit"></i> <?php echo e(trans('lang.edit')); ?></a>
  									
  										<button class="btn btn-danger btn-sm" onclick="btnDestory_click(<?php echo e($user->id); ?>)"><i class="fa fa-trash"></i> <?php echo e(trans('lang.destroy')); ?></button>
  										
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