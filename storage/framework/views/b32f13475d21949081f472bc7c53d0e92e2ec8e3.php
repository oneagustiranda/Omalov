<?php $__env->startSection('container'); ?>
    <div class="container mt-2">
        <h1 class="mb-3 text-center"><?php echo e($title); ?></h1>

        <div class="row justify-content-center mb-3">
            <div class="col-md-6">
                <form action="/posts">
                    <?php if(request('category')): ?>
                        <input type="hidden" name="category" value="<?php echo e(request('category')); ?>">
                    <?php endif; ?>
                    <?php if(request('author')): ?>
                        <input type="hidden" name="author" value="<?php echo e(request('author')); ?>">
                    <?php endif; ?>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Search.." name="search" value="<?php echo e(request('search')); ?>">
                        <button class="btn btn-primary" type="submit">Search</button>
                      </div>
                </form>
            </div>
        </div>

        <?php if($posts->count()): ?>
            <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <article class="mb-5 border-bottom pb-4">
                    <?php if($item->image): ?>
                        <div style="max-height: 350px; overflow:hidden;">
                            <img src="<?php echo e(asset('storage/' . $item->image)); ?>" alt="<?php echo e($item->category->name); ?>" class="img-fluid">
                        </div>            
                    <?php else: ?>
                        <img src="https://source.unsplash.com/1200x400?<?php echo e($item->category->name); ?>" alt="<?php echo e($item->category->name); ?>" class="img-fluid">
                    <?php endif; ?>
                    <h2>
                        <a href="/posts/<?php echo e($item->slug); ?>" class="text-decoration-none"><?php echo e($item->title); ?></a>
                    </h2>
                    

                    <p><?php echo e($item->excerpt); ?></p>

                    <a href="/posts/<?php echo e($item->slug); ?>" class="text-decoration-none">Read more..</a>
                </article>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
        <?php else: ?>
            <p class="text-center fs-4">No post found.</p>
        <?php endif; ?>
        
        <div class="d-flex justify-content-end">
            <?php echo e($posts->links()); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/onux/Documents/Service/laravel-project/omalov/resources/views/posts.blade.php ENDPATH**/ ?>