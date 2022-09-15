<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
      <a class="navbar-brand" href="/">Omalov</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link <?php echo e(Request::is('home') ? 'active' : ''); ?>" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php echo e(Request::is('about') ? 'active' : ''); ?>" href="/about">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php echo e(Request::is('posts') ? 'active' : ''); ?>" href="/posts">Blog</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php echo e(Request::is('categories') ? 'active' : ''); ?>" href="/categories">Categories</a>
          </li>
        </ul>

        <?php if(auth()->guard()->check()): ?>
          <ul class="navbar-nav ms-auto">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Hai, <?php echo e(auth()->user()->name); ?>

              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#">Profil</a></li>
                <li><hr class="dropdown-divider"></li>
                <li>
                  <form method="POST" action="/logout">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="dropdown-item">Keluar</button>
                  </form>
                </li>
              </ul>
            </li>
          </ul>
        
        <?php else: ?>
          <form class="d-flex">
            <a href="/login" class="btn rounded-pill btn-link <?php echo e(($active=== 'login') ? 'active' : ''); ?> mr-2">Masuk</a>
            <a href="/register" class="btn rounded-pill btn-outline-primary">Daftar</a>
          </form>
        <?php endif; ?>
        
      </div>
    </div>
</nav><?php /**PATH /home/onux/Documents/Service/laravel-project/omalov/resources/views/partials/navbar.blade.php ENDPATH**/ ?>