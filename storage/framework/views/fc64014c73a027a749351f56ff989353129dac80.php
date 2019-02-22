<?php $__env->startSection('header'); ?>
<title>Tong Tin Management System</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <p><i class="fa fa-angle-right" style="padding-top: 2px;"></i> <a href="<?php echo e(route('tongtins.index', $local )); ?>"><?php echo e(trans('lang.tongtin')); ?></a> / <?php echo e(trans('lang.create')); ?></p>
            </div>
        </div>
    </div>
    <div class="container">
        <!-- start row -->
        <div class="row">
            <div class="col">
                <!-- START FORM CREATE -->
                <form action="<?php echo e(route('tongtins.store', $local )); ?>" method="post" autocomplete="off">
                <?php echo csrf_field(); ?>
                <!-- START CARD  -->
                    <div class="card">
                        <div class="card-header">
                            <?php echo e(trans('lang.new_tongtin')); ?>

                            <a class="close" href="<?php echo e(route('tongtins.index', $local )); ?>">
                                <span aria-hidden="true">&times;</span>
                            </a>
                        </div>
                        <!-- START CARD-BODY -->
                        <div class="card-body">

                            <div class="form-group ">
                                <div class="row">
                                    <label for="name" class="col-12 col-sm-12 col-md-4"><?php echo e(trans('lang.leader_name')); ?></label>
                                    <div class="col-12 col-sm-12 col-md-8">
                                        <select name="leader_id" class="form-control form-control-sm">
                                            <option value="0"><?php echo e(trans('lang.select_leader')); ?></option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <label for="name" class="col-12 col-sm-12 col-md-4"><?php echo e(trans('lang.price')); ?></label>
                                    <div class="col-12 col-sm-12 col-md-8">
                                        <input type="text" name="price" class="form-control form-control-sm" placeholder="<?php echo e(trans('lang.tongtin_price')); ?>">
                                    </div>
                                </div>
                            </div>


                            <div class="form-group ">
                                <div class="row">
                                    <label for="name" class="col-12 col-sm-12 col-md-4"><?php echo e(trans('lang.payment_type')); ?></label>
                                    <div class="col-12 col-sm-12 col-md-8">
                                        <select name="leader_id" class="form-control form-control-sm">
                                            <option value="0"><?php echo e(trans('lang.select_payment_type')); ?></option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                        </div> 
                        <!-- END OF CARD-BDOY -->
                    </div>
                    <div class="card-footer bg-secondary">
                        <div class="text-right">
                        <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-download"></i> <?php echo e(trans('lang.price')); ?></button>
                        </div>
                    </div>
                    <!-- END OF CARD -->
                    
                </form>
                <!-- END OF FORM CREATE USER -->
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>