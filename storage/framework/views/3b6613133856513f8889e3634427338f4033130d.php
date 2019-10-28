<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <a class="dropdown-item" href="<?php echo e(url('/deper')); ?>">
                        Department
                    </a>
                    <a class="dropdown-item" href="<?php echo e(url('/otdel')); ?>">
                        Otdels
                    </a>
                    <a class="dropdown-item" href="<?php echo e(url('/people')); ?>">
                        People
                    </a>
                    <?php if(session('status')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('status')); ?>


                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\OpenServer\OSPanel\domains\TestPhonebook2\resources\views/home.blade.php ENDPATH**/ ?>