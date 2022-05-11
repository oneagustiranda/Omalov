<?php $__env->startSection('container'); ?>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">My Post</h1>
    </div>

    <?php if(session()->has('success')): ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?php echo e(session('success')); ?>

        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php endif; ?>

    <a href="/dashboard/posts/create" class="btn btn-primary mb-3">Create new post</a>
    <table class="table table-striped table-sm">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Judul</th>
            <th scope="col">Kategori</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($loop->iteration); ?></td>
                <td><?php echo e($post->title); ?></td>
                <td><?php echo e($post->category->name); ?></td>
                <td>
                    <a href="/dashboard/posts/<?php echo e($post->slug); ?>" class="badge bg-info">details</a>
                    <a href="/dashboard/posts/<?php echo e($post->slug); ?>/edit" class="badge bg-warning">edit</a>
                    <form action="/dashboard/posts/<?php echo e($post->slug); ?>" method="POST" class="d-inline">
                      <?php echo method_field('delete'); ?>
                      <?php echo csrf_field(); ?>
                      <button class="badge bg-danger border-0" onclick="return confirm('Anda akan menghapus post ini?')">hapus</button>
                    </form>
                </td>
              </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
      </table>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/onux/Documents/Service/laravel-project/omalov/resources/views/dashboard/posts/index.blade.php ENDPATH**/ ?>