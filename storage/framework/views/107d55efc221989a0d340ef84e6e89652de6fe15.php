<?php $__env->startSection('container'); ?>
    <div class="container mt-2">
        <article class="mb-5">
            <h2><?php echo e($post->title); ?></h2>
            <p>By. <a href="/posts?author=<?php echo e($post->author->username); ?>" class="text-decoration-none"><?php echo e($post->author->name); ?></a> in <a href="/posts?category=<?php echo e($post->category->slug); ?>" class="text-decoration-none"><?php echo e($post->category->name); ?></a></p>
    
            <?php if($post->image): ?>
                <div style="max-height: 350px; overflow:hidden;">
                    <img src="<?php echo e(asset('storage/' . $post->image)); ?>" alt="<?php echo e($post->category->name); ?>" class="img-fluid">
                </div>            
            <?php else: ?>
                <img src="https://source.unsplash.com/1200x400?<?php echo e($post->category->name); ?>" alt="<?php echo e($post->category->name); ?>" class="img-fluid">
            <?php endif; ?>
    
            <?php echo $post->body; ?> 
        </article>
    
        <a href="/posts">Back to Posts</a>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/onux/Documents/Service/laravel-project/omalov/resources/views/post.blade.php ENDPATH**/ ?>