<?php $__env->startSection('content'); ?>
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h3>Edit Otdel</h3>
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

    <form action="<?php echo e(route('otdel.update', $otdeldate->id)); ?>" method="post">
      <?php echo csrf_field(); ?>
      <?php echo method_field('PUT'); ?>
      <div class="row">
        <div class="col-md-12">
          <strong>Name Otdel :</strong>
          <input type="text" name="name" class="form-control" value="<?php echo e($otdeldate->name); ?>">
        </div>
        <div class="col-md-12">
          <strong>Name Department of Otdel :</strong>
          <select class="form-control" name="name_deper">
            <?php $__currentLoopData = $deperdatas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $deperdata): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>    
                  <option><?php echo e($deperdata->name); ?>   </option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </select>
        </div>
        <br>
        <br>
        <br>
        <br>
        <div class="col-md-12">
          <a href="<?php echo e(route('otdel.index')); ?>" class="btn btn-sm btn-success">Back</a>
          <button type="submit" class="btn btn-sm btn-primary">Submit</button>
        </div>

      </div>
    </form>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\OpenServer\OSPanel\domains\TestPhonebook2\resources\views/otdeldate/edit.blade.php ENDPATH**/ ?>