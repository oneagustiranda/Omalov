<!DOCTYPE html>
<html lang="id">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<title>Admin Dashboard | Omalov</title>
	<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

	<!-- CSS -->
	<link rel="stylesheet" href="/css/bootstrap.css">
	<link rel="stylesheet" href="/plugins/fontawesome/css/fontawesome.min.css">
	<link rel="stylesheet" href="/plugins/fontawesome/css/all.min.css">
	<link rel="stylesheet" href="/css/plugins/morris.css">
	<link rel="stylesheet" href="/css/admin-style.css">
	@yield('additional-css')	
</head>

<body>
	<div class="main-wrapper">
		@include('admin.layouts.header')
		@include('admin.layouts.sidebar')
		<div class="page-wrapper">
			<div class="content container-fluid">
				@yield('container')
			</div>
		</div>
	</div>

	<!-- JS -->
	<script src="/js/jquery-3.5.1.min.js"></script>
	<script src="/js/popper.min.js"></script>
	<script src="/js/bootstrap.bundle.js"></script>	
	<script src="/plugins/jquery.slimscroll.min.js"></script>
	<script src="/js/admin-script.js"></script>
	@yield('additional-js')
</body>
</html>