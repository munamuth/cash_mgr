<?php $__env->startSection('header'); ?>
<title>Tong Tin Management System</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-sm-6">
                <p><i class="fa fa-angle-right" style="padding-top: 2px;"></i> <?php echo e(trans('lang.player')); ?></p>
            </div>
            <div class="col-12 col-sm-6">
                <div class="text-right">
                    <a href="<?php echo e(route('player.create', $local)); ?>" class="btn btn-success btn-sm"><i class="fa fa-plus"> <?php echo e(trans('lang.create')); ?></i> </a>
                </div>

            </div>
        </div>
    </div>
    <div class="container-fluid">
        <!-- start row -->
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-tripped">
                                <thead>
                                    <tr>
                                        <th><?php echo e(trans('lang.no')); ?></th>
                                        <th><?php echo e(trans('lang.name')); ?></th>
                                        <th><?php echo e(trans('lang.phone')); ?></th>
                                        <th><?php echo e(trans('lang.address')); ?></th>
                                        <th><?php echo e(trans('lang.action')); ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $players; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $player): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($index+1); ?></td>
                                        <td><?php echo e($player->name); ?></td>
                                        <td><?php echo e($player->phone); ?></td>
                                        <td><?php echo e($player->address); ?></td>
                                        <td class="d-flex">
                                            <a href="<?php echo e(route('player.edit', [$local, $player->id])); ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> <?php echo e(trans('lang.edit')); ?></a>
                                            <a href="#" class="btn btn-info btn-sm" onclick ="btnDetail_click(<?php echo e($player->id); ?>)"><i class="fa fa-eye"></i> <?php echo e(trans('lang.show')); ?></a>
                                            <form action="<?php echo e(route('player.destroy', [$local, $player->id])); ?>" method="post">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> <?php echo e(trans('lang.destroy')); ?></button>
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
        </div>
    </div>




    <div class="modal" tabindex="-1" role="dialog" id="modalShow">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?php echo e(trans('lang.show')); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-4 col-sm-4 col-md-3">
                            Name
                        </div>
                        <div class="col-8 col-sm-8 col-md-9">
                            <p id="name"></p>
                        </div>
                        <div class="col-4 col-sm-4 col-md-3">
                            Phone
                        </div>
                        <div class="col-8 col-sm-8 col-md-9">
                            <p id="phone"></p>
                        </div>
                         <div class="col-4 col-sm-4 col-md-3">
                            Addfess
                        </div>
                        <div class="col-8 col-sm-8 col-md-9">
                            <p id="address"></p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script type="text/javascript">
        function btnDetail_click(id) {
            $.ajax({
                url : "/tongtin/player/"+id,
                type : 'get',
                success : function(data){
                    console.log(data)
                    $('#modalShow').modal();
                    $("#name").html(data.DATA.name)
                    $("#phone").html(data.DATA.phone)
                    $("#address").html(data.DATA.address)
                },  
                error : function(data){
                    console.log("error");
                }
            })
        }
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>