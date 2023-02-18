<div class="bottom-bar mt-5">
  <ul class="nav">
    <span class="nav-indicator"></span>
    <li>
      <a href="/dashboard" class="{{ Request::is('dashboard') ? 'nav-item-active' : '' }}">
        <i class="fa-solid fa-house"></i>
        <span class="title">Dasbor</span>
      </a>
    </li>
    <li>
      <a href="/friends" class="{{ Request::is('friends*') ? 'nav-item-active' : '' }}">
        <i class="fa-solid fa-user-group"></i>
        <span class="title">Teman</span>
      </a>
    </li>
    <li>
      <a href="#" class="{{ Request::is('chat') ? 'nav-item-active' : '' }}">
        <i class="fa-solid fa-message"></i>
        <span class="title">Pesan</span>
      </a>
    </li>
    <li>
      <a href="#" class="{{ Request::is('notif') ? 'nav-item-active' : '' }}">
        <i class="fa-solid fa-bell"></i>
        <span class="title">Notifikasi</span>
      </a>
    </li>
  </ul>
</div>

  