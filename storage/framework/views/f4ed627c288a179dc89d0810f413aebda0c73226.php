<!DOCTYPE html>
<html>
<head>
<title>PhoneBook</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="<?php echo e(asset('css/bootstrap.min.css')); ?>">
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            .container {
                position: relative;
                top: 130px;
            }
        </style>
</head>
<body>
   <?php if(Route::has('login')): ?>   
        <div class="top-right links">
            <?php if(auth()->guard()->check()): ?>
                <a href="<?php echo e(url('/home')); ?>">Home</a>
            <?php else: ?>
                <a href="<?php echo e(route('login')); ?>">Login</a>

                <?php if(Route::has('register')): ?>
                    <a href="<?php echo e(route('register')); ?>">Register</a>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    <?php endif; ?>
    <div class="container">
        <form action="/search" method="POST" role="search">
            <?php echo e(csrf_field()); ?>

            <div class="input-group" style = "left: 150px;">
                <input type="text" class="form-control" name="q" placeholder="Search users"> 
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-default">
                            Search
                        </button>
                    </span>
                  <select name = "ST" class="form-control" style = "width: 170px;">

                    <?php if(isset($details)): ?>
                        <option><?php echo e($query); ?></option>
                        <?php $__currentLoopData = $deperdatas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $deperdata): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>    
                              <?php if($deperdata->name != $query): ?> 
                                  <option><?php echo e($deperdata->name); ?></option>
                              <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <option>Chose department</option>
                        <?php $__currentLoopData = $deperdatas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $deperdata): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>    
                              <option><?php echo e($deperdata->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                  </select>

                  <select name = "ST1" class="form-control" style = "width: 125px;">
                        <option>Chose otdel</option>
                        <?php echo e($pt = "-1"); ?>

                        <?php $__currentLoopData = $otdeldates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $otdeldate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>   
                              <?php if($pt != $otdeldate->name_deper): ?>
                                  <optgroup label = "<?php echo e($otdeldate->name_deper); ?>"></optgroup> 
                              <?php endif; ?>
                              <option><?php echo e($otdeldate->name); ?></option>
                              <?php echo e($pt = $otdeldate->name_deper); ?>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>

               <!--- <a href="<?php echo e(url('/deper')); ?>" class="form-control" style = "width: 100px">Department</a>
                <a href="<?php echo e(url('/search_otdel')); ?>" class="form-control" style = "width: 60px">Otdel</a>
                -->
            </div>
        </form>
        <div class="container">
            <?php if(isset($details)): ?>
            <h2>Search result:</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Phone Number</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Department</th>
                        <th>Otdel</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                          <td><?php echo e($user->name); ?></td>
                          <td><?php echo e($user->phone_number); ?></td>
                          <td><?php echo e($user->email); ?></td>
                          <td><?php echo e($user->address); ?></td>
                          <td><?php echo e($user->Dep_name); ?></td>
                          <td><?php echo e($user->otd_name); ?></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            <?php elseif(isset($message)): ?>
            <p><?php echo e($message); ?></p>
            <?php endif; ?>
        </div>

</body>
</html><?php /**PATH F:\OpenServer\OSPanel\domains\TestPhonebook2\resources\views/welcome.blade.php ENDPATH**/ ?>