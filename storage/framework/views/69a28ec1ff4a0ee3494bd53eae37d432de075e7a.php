<?php $__env->startSection('content'); ?>

  <div class="container">
    <div class="row">
      <div class="col-md-10">
        <h3>List Peoples</h3>
      </div>
      <div class="col-sm-2">
        <a class="btn btn-sm btn-success" href="<?php echo e(route('people.create')); ?>">Add New Peoples</a>
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
        <th width = "300px">Name peoples</th>
        <th width = "300px">Phone number</th>
        <th width = "300px">email</th>
        <th width = "300px">address</th>
        <th width = "300px">Department name</th>
        <th width = "300px">Otdel name</th>
      </tr>

      <?php $__currentLoopData = $peodatas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $peodata): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
          <td><b><?php echo e(++$i); ?>.</b></td>
          <td><?php echo e($peodata->name); ?></td>
          <td><?php echo e($peodata->phone_number); ?></td>
          <td><?php echo e($peodata->email); ?></td>
          <td><?php echo e($peodata->address); ?></td>
          <td><?php echo e($peodata->Dep_name); ?></td>
          <td><?php echo e($peodata->otd_name); ?></td>

          <td>
            <form action="<?php echo e(route('people.destroy', $peodata->id)); ?>" method="post">
              <a class="btn btn-sm btn-warning" href="<?php echo e(route('people.edit', $peodata->id)); ?>">Edit</a>

              <?php echo csrf_field(); ?>
              <?php echo method_field('DELETE'); ?>
              <button type="submit" class="btn btn-sm btn-danger">Delete</button>
            </form>
          </td>
        </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>

<?php echo $peodatas->links(); ?>

  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\OpenServer\OSPanel\domains\TestPhonebook2\resources\views/peopledate/index.blade.php ENDPATH**/ ?>