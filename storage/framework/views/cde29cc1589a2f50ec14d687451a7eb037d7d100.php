<?php $__env->startSection('container'); ?>
    <section class="login d-flex">
      <div class="login-left h-100">
          <div class="row justify-content-center align-items-center h-100">
              <div class="form-container">
                  <div class="header mb-4">
                    <a href="/" class="btn btn-sm rounded-pill btn-outline-primary">&#8592;</a>
                    <?php if(session()->has('success')): ?>
                      <div class="alert alert-success alert-dismissible fade show mt-3 mb-2" role="alert">
                        <?php echo e(session('success')); ?>

                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                    <?php endif; ?>
      
                    <?php if(session()->has('loginError')): ?>
                      <div class="alert alert-danger alert-dismissible fade show mt-3 mb-2" role="alert">
                        <?php echo e(session('loginError')); ?>

                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                    <?php endif; ?>
                    <h1 class="h3 fw-bold mt-3">Masuk</h1>
                    <p>Selamat datang di Omalov, silahkan masuk untuk memulai</p>
                  </div>
      
                  <div class="form-login">
                    <form method="POST" action="/login">
                      <?php echo csrf_field(); ?>
                      <div class="form-floating">
                        <input type="email" name="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="email" placeholder="name@example.com" autofocus required value="<?php echo e(old('email')); ?>">
                        <label for="email">Alamat email</label>
                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                          <div class="invalid-feedback">
                            <?php echo e($message); ?>

                          </div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                      </div>
                      <div class="form-floating">
                        <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                        <label for="password">Kata sandi</label>
                      </div>
                          
                      <button class="w-100 btn rounded-pill btn-primary mt-3" type="submit">Masuk</button>
                    </form>
                    <small class="d-block text-center mt-3">Belum punya Akun? <a href="/register">Daftar</a></small>
                  </div>
              </div>
              <p class="fs-6 text-center text-muted">Build Version 20230204.01</p>
          </div>          
      </div>
      <div class="login-right bg-primary">

      </div>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.nonavbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/onux/Documents/Service/laravel-project/omalov/resources/views/login/index.blade.php ENDPATH**/ ?>