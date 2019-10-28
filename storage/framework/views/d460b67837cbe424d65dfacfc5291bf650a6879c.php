<?php $__env->startSection('content'); ?>

  <div class="container">
    <div class="row">
      <div class="col-md-10">
        <h3>List Department</h3>
      </div>
      <div class="col-sm-2">
        <a class="btn btn-sm btn-success" href="<?php echo e(route('deper.create')); ?>">Create New Department</a>
      </div>
    </div>

    <?php if($message = Session::get('success')): ?>
      <div class="alert alert-success">
        <p><?php echo e($message); ?></p>
      </div>
    <?php endif; ?>

    <table class="table table-hover table-sm">
      <tr>
        <th width = "50px"><b>No.</b></th>
        <th width = "300px">Name Department</th>
      </tr>

      <?php $__currentLoopData = $deperdatas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $deperdata): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
          <td><b><?php echo e(++$i); ?>.</b></td>
          <td><?php echo e($deperdata->name); ?></td>
          <td>
            <form action="<?php echo e(route('deper.destroy', $deperdata->id)); ?>" method="post">
              <a class="btn btn-sm btn-warning" href="<?php echo e(route('deper.edit', $deperdata->id)); ?>">Edit</a>
              <?php echo csrf_field(); ?>
              <?php echo method_field('DELETE'); ?>
              <button type="submit" class="btn btn-sm btn-danger">Delete</button>
            </form>
          </td>
        </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>

<?php echo $deperdatas->links(); ?>

  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\OpenServer\OSPanel\domains\TestPhonebook2\resources\views/depdata/index.blade.php ENDPATH**/ ?>