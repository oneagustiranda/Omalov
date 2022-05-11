<?php $__env->startSection('container'); ?>
<h1 class="mb-5">Post category: <?php echo e($category); ?></h1>

    <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <article>
            <h2>
                <a href="/posts/<?php echo e($item->slug); ?>"><?php echo e($item->title); ?></a>
            </h2>
            <p><?php echo e($item->excerpt); ?></p>
        </article>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/onux/Documents/Service/laravel-project/omalov/resources/views/category.blade.php ENDPATH**/ ?>