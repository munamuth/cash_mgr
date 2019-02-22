<?php $__env->startSection('header'); ?>
<title>Tong Tin Management System</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <p><i class="fa fa-angle-right" style="padding-top: 2px;"></i><?php echo e(trans('lang.player_list')); ?></a></p>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="card">
            <div class="card-header"><?php echo e(trans('lang.player_list')); ?></div>
        </div>
        <div class="card-bod p-0">
            <table class="table table-hoverred">
                <thead>
                    <th><?php echo e(trans('lang.no')); ?></th>
                    <th><?php echo e(trans('lang.name')); ?></th>
                    <th><?php echo e(trans('lang.action')); ?></th>
                </thead>
            </table>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>