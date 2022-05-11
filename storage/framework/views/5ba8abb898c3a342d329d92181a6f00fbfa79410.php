<?php $__env->startSection('container'); ?>
    <div class="container mt-2">
        <h1 class="mb-5">Post categories</h1>

        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <ul>
                <li>
                    <a href="/posts?category=<?php echo e($item->slug); ?>"><?php echo e($item->name); ?></a>
                </li>
            </ul>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/onux/Documents/Service/laravel-project/omalov/resources/views/categories.blade.php ENDPATH**/ ?>