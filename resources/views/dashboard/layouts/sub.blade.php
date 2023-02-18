<!doctype html>
<html lang="id">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Omalov Dashboard</title>

    <!-- CSS -->
    <link href="/css/bootstrap.css" rel="stylesheet">
    <link href="/css/dashboard.css" rel="stylesheet">

    <link rel="stylesheet" href="/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="/plugins/fontawesome/css/all.min.css">
  </head>
  <body>
    <div class="container-fluid mb-5">
      <div class="row">
          @include('dashboard.layouts.sidebar')

          <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
          @yield('container')      
          </main>
      </div>
    </div>
    <script src="/js/bootstrap.js"></script>
  </body>
</html>
