<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Omalov Dashboard</title>

    <!-- CSS -->
    <link href="/css/bootstrap.css" rel="stylesheet">
    <link href="/css/dashboard.css" rel="stylesheet">

    <link href="/css/bottombar.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  </head>
  <body>
    
@include('dashboard.layouts.header')

    <div class="container-fluid">
    <div class="row">
        @include('dashboard.layouts.sidebar')

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        @yield('container')      
        </main>
    </div>
    </div>

    @include('dashboard.layouts.bottombar')   
    

    <script src="/js/bootstrap.js"></script>
    <script src="/js/bottombar.js"></script>
  </body>
</html>
