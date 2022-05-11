<?php $__env->startSection('container'); ?>
    <h2><?php echo e($post->title); ?></h2>
    <a href="/dashboard/posts" class="btn btn-success">Back to my posts</a>
    <form action="/dashboard/posts/<?php echo e($post->slug); ?>" method="POST" class="d-inline">
        <?php echo method_field('delete'); ?>
        <?php echo csrf_field(); ?>
        <button class="btn btn-danger" onclick="return confirm('Anda akan menghapus post ini?')">hapus</button>
      </form>
    <article class="my-3"> 
        <?php if($post->image): ?>
            <div style="max-height: 350px; overflow:hidden;">
                <img src="<?php echo e(asset('storage/' . $post->image)); ?>" alt="<?php echo e($post->category->name); ?>" class="img-fluid mt-3">
            </div>            
        <?php else: ?>
            <img src="https://source.unsplash.com/1200x400?<?php echo e($post->category->name); ?>" alt="<?php echo e($post->category->name); ?>" class="img-fluid mt-3">
        <?php endif; ?>

        <?php echo $post->body; ?> 
    </article>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/onux/Documents/Service/laravel-project/omalov/resources/views/dashboard/posts/show.blade.php ENDPATH**/ ?>