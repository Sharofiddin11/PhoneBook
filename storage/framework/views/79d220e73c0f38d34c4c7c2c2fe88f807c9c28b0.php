<?php $__env->startSection('content'); ?>
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h3>Edit People</h3>
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

    <form action="<?php echo e(route('people.update', $peodata->id)); ?>" method="post">
      <?php echo csrf_field(); ?>
      <?php echo method_field('PUT'); ?>
      <div class="row">
        
        <div class="col-md-12">
          <strong>Name people:</strong>
          <input type="text" name="name" class="form-control" placeholder="Name Otdel">
        </div>
        <div class="col-md-12">
          <strong>Phone number</strong>
          <input type="text" name="phone_number" class="form-control" placeholder="Phone number">
        </div>
        <div class="col-md-12">
          <strong>email</strong>
          <input type="text" name="email" class="form-control" placeholder="email">
        </div>
        <div class="col-md-12">
          <strong>address</strong>
          <input type="text" name="address" class="form-control" placeholder="address">
        </div>

        <div class="col-md-12">
          <strong>Name Department of People :</strong>
          <select class="form-control" name="Dep_name">
            <?php $__currentLoopData = $deperdatas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $deperdata): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>    
                  <option><?php echo e($deperdata->name); ?>   </option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </select>
        </div>
        <br>
        <br>
        <div class="col-md-12">
          <select class="form-control" name="otd_name">
            <?php $__currentLoopData = $otdeldates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $otdeldata): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>    
                  <optgroup label = "<?php echo e($otdeldata->name_deper); ?>"></optgroup>
                  <option><?php echo e($otdeldata->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </select>
        </div> 
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\OpenServer\OSPanel\domains\TestPhonebook2\resources\views/peopledate/edit.blade.php ENDPATH**/ ?>