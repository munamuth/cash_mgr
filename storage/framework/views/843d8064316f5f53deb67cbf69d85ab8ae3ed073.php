<?php $__env->startSection('header'); ?>
<title>Tong Tin Management System</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <p><i class="fa fa-angle-right" style="padding-top: 2px;"></i> <a href="<?php echo e(route('player.index')); ?>">Tong Tin Player</a> / Create New</p>
            </div>
        </div>
    </div>
    <div class="container">
        <!-- start row -->
        <div class="row">
            <div class="col">
                <!-- START FORM CREATE -->
                <form action="<?php echo e(route('player.store')); ?>" method="post" autocomplete="off">
                <?php echo csrf_field(); ?>
                <!-- START CARD  -->
                    <div class="card">
                        <div class="card-header">
                            Create New Player
                            <a class="close" href="<?php echo e(route('player.index')); ?>">
                                <span aria-hidden="true">&times;</span>
                            </a>
                        </div>
                        <!-- START CARD-BODY -->
                        <div class="card-body">

                            <div class="form-group ">
                                <div class="row">
                                    <label for="name" class="col-12 col-sm-12 col-md-4">Name</label>
                                    <div class="col-12 col-sm-12 col-md-8">
                                        <input type="text" name="name" class="form-control form-control-sm" placeholder="Player's name">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <label for="name" class="col-12 col-sm-12 col-md-4">Phone Number</label>
                                    <div class="col-12 col-sm-12 col-md-8">
                                        <input type="text" name="phone" class="form-control form-control-sm" placeholder="Player's phone number">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <label for="address" class="col-12 col-sm-12 col-md-4">Address</label>
                                    <div class="col-12 col-sm-12 col-md-8">
                                        <textarea name="address" rows="2" class="form-control" placeholder="Player's address"></textarea>
                                    </div>
                                </div>
                            </div>

                        </div> 
                        <!-- END OF CARD-BDOY -->
                    </div>
                    <div class="card-footer bg-secondary">
                        <div class="text-right">
                        <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-download"></i> Save</button>
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