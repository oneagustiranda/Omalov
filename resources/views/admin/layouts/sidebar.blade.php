<div class="sidebar" id="sidebar">
  <div class="sidebar-inner slimscroll">
    <div id="sidebar-menu" class="sidebar-menu">
      <ul>
        <li class="{{ Request::is('admin') ? 'active' : '' }}"> <a href="/admin"><i class="fas fa-tachometer-alt"></i> <span>Dasbor</span></a> </li>
        <li class="list-divider"></li>
        <li class="submenu {{ Request::is('admin/users*') ? 'active' : '' }}"> <a href="/admin/users"><i class="fa-solid fa-user"></i> <span> Pengguna </span> <span class="menu-arrow"></span></a>
          <ul class="submenu_class">
            <li><a href="/admin/users">Pengguna terdaftar</a></li>
            <li><a href="#"> Edit Booking </a></li>
            <li><a href="#"> Add Booking </a></li>
          </ul>
        </li>
        
        {{-- <li class="list-divider"></li>
        <li class="menu-title mt-3"> <span>TULISAN</span> </li>
        <li class="submenu {{ Request::is('dashboard/categories*') ? 'active' : '' }}"> <a href="/dashboard/categories"><i class="fas fa-columns"></i> <span> Kategori post </span> <span class="menu-arrow"></span></a>
          <ul class="submenu_class" style="display: none;">
            <li><a href="/dashboard/categories">Kategori post</a></li>
            <li><a href="register.html">Register </a></li>
            <li><a href="forgot-password.html">Forgot Password </a></li>
            <li><a href="change-password.html">Change Password </a></li>
            <li><a href="lock-screen.html">Lockscreen </a></li>
            <li><a href="profile.html">Profile </a></li>
            <li><a href="gallery.html">Gallery </a></li>
            <li><a href="error-404.html">404 Error </a></li>
            <li><a href="error-500.html">500 Error </a></li>
            <li><a href="blank-page.html">Blank Page </a></li>
          </ul>
        </li>
        <li class="submenu"> <a href="#"><i class="fas fa-share-alt"></i> <span> Multi Level </span> <span class="menu-arrow"></span></a>
          <ul class="submenu_class" style="display: none;">
            <li><a href="">Level 1 </a></li>
            <li><a href="">Level 2 </a></li>
          </ul>
        </li> --}}
      </ul>
    </div>
  </div>
</div>