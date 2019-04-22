<head>
	<title> @yield('title')</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/vendor/font-awesome/css/font-awesome.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/vendor/linearicons/style.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/vendor/chartist/css/chartist-custom.css') }}">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}">
	<!-- CK EDITOR -->
	<script src="https://cdn.ckeditor.com/ckeditor5/12.0.0/classic/ckeditor.js"></script>

	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/apple-icon.png') }}">
	<link rel="icon" type="image/png" sizes="96x96" href="{{ asset('assets/img/favicon.png') }}">
	<!-- Uploadfile -->
	<script type="text/javascript" src="{{ asset('js/uploadfile.js') }}"></script>

	<!-- Datatable JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.js" type="text/javascript" charset="utf-8"></script>
	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js" type="text/javascript" charset="utf-8"></script>
	<!-- ckeditor -->
	<script src="https://cdn.ckeditor.com/ckeditor5/12.0.0/classic/ckeditor.js"></script>

	<!-- Mascara -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>


	<!-- Datatable CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">



	<!-- Scripts de Menu Fundamentais -->

	<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
	<script src="{{ asset('assets/scripts/klorofil-common.js') }}"></script>


</head>
