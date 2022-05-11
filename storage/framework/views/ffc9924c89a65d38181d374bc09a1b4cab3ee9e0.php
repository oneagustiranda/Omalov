<?php $__env->startSection('container'); ?>
    <div class="container mt-2">
        <h1>Halaman about</h1>
        <h3><?php echo e($name); ?></h3>
        <p><?php echo e($email); ?></p>
    </div>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/onux/Documents/Service/laravel-project/omalov/resources/views/about.blade.php ENDPATH**/ ?>