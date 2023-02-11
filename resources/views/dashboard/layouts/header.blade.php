<header class="navbar navbar-dark sticky-top bg-primary flex-md-nowrap p-0 shadow">
    <a class="navbar-brand bg-primary col-md-3 col-lg-2 me-0 px-3" href="#">Omalov</a>
    
    <div class="navbar-nav">
      <div class="nav-item text-nowrap">
        <form method="POST" action="/logout">
          @csrf
          <button type="submit" class="nav-link px-3 bg-primary border-0">Keluar</button>
        </form>
      </div>
    </div>
  </header>