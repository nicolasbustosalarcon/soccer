<?php $__env->startSection('titulo', 'Partidos'); ?>

<?php $__env->startSection('content'); ?>
    <div class="col">
        <div class="row ">
            <?php $__currentLoopData = $club; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $clu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div>
                    <a href="<?php echo e(route('club.show', $clu->idClub)); ?>" class="text-dark">
                        <span><?php echo e($clu->nombreClub); ?></span>
                        <img src="<?php echo e(asset('images/club/' .$clu->imagenClub)); ?>" class="img-responsive" style="width:50px !important; height:50px !important">
                    </a>
                </div>
        	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <div class="row">
        	<a href="../../partido"><button class="btn btn-danger">Volver</button> </a>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>