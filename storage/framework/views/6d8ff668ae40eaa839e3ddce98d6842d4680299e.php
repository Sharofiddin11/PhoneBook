<?php $__env->startSection('content'); ?>
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h3>New Departament</h3>
      </div>
    </div>

    <?php if($errors->any()): ?>
      <div class="alert alert-danger">
        <strong>Whoops! </strong> there where some problems with your input.<br>
        <ul>
          <?php $__currentLoopData = $errors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><?php echo e($error); ?></li>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
      </div>
    <?php endif; ?>

    <form action="<?php echo e(route('deper.store')); ?>" method="post">
      <?php echo csrf_field(); ?>
      <div class="row">
        <div class="col-md-12">
          <strong>Name of Department:</strong>
          <input type="text" name="name" class="form-control" placeholder="Name Departament">
        </div>

        <div class="col-md-12">
          <button type="submit" class="btn btn-sm btn-primary">Submit</button>
        </div>
      </div>
    </form>

  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\OpenServer\OSPanel\domains\TestPhonebook2\resources\views/depdata/create.blade.php ENDPATH**/ ?>