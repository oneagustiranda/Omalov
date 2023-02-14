<div class="sidebar" id="sidebar">
  <div class="sidebar-inner slimscroll">
    <div id="sidebar-menu" class="sidebar-menu">
      <ul>
        <li class="{{ Request::is('admin') ? 'active' : '' }}"> <a href="/admin"><i class="fas fa-tachometer-alt"></i> <span>Dasbor</span></a> </li>
        <li class="list-divider"></li>
        <li class="submenu {{ Request::is('admin/users*') ? 'active' : '' }}"> <a href="/admin/users"><i class="fa-solid fa-user"></i> <span> Pengguna </span> <span class="menu-arrow"></span></a>
          <ul class="submenu_class">
            <li><a href="/admin/users">Pengguna terdaftar</a></li>
            <li><a href="#">Akses pengguna</a></li>
            <li><a href="#">Pengguna langganan</a></li>
          </ul>
        </li>

        <li class="{{ Request::is('admin/posts*') ? 'active' : '' }}">
          <a href="/admin/posts"><i class="fas fa-columns"></i>
            <span>Tulisan</span>
          </a>         
        </li>
        
        <li class="list-divider"></li>
        <li class="menu-title mt-3"> <span>KONFIGURASI</span> </li>
        <li class="submenu {{ Request::is('admin/masterdata/*') ? 'active' : '' }}"> <a href="#"><i class="fas fa-gear"></i> <span> Master data </span> <span class="menu-arrow"></span></a>
          <ul class="submenu_class" style="display: none;">
            <li><a href="/admin/masterdata/categories">Kategori post</a></li>
          </ul>
        </li>
        {{-- <li class="submenu"> <a href="#"><i class="fas fa-share-alt"></i> <span> Multi Level </span> <span class="menu-arrow"></span></a>
          <ul class="submenu_class" style="display: none;">
            <li><a href="">Level 1 </a></li>
            <li><a href="">Level 2 </a></li>
          </ul>
        </li> --}}
      </ul>
    </div>
  </div>
</div>