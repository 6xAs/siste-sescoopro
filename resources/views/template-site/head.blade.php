<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
	<title>@yield('title')</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>


	<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>

	<!-- Bootstrap Core CSS -->
	<link href="{{ asset('css/bootstrap.css') }}" rel='stylesheet' type='text/css' />
	<link href="{{ asset('css/style.css') }}" rel='stylesheet' type='text/css' />

	<!-- pop up box -->
	<link href="{{ asset('css/popuo-box.css') }}" rel="stylesheet" type="text/css" media="all" />
	<!-- font-awesome icons -->
	<link href="{{ asset('css/fontawesome-all.min.css') }}" rel="stylesheet">
	<!-- //Custom Theme files -->
	<!-- online fonts -->
	<!-- titles -->
	<link href="//fonts.googleapis.com/css?family=Raleway:300,400,500,600,700,800,900" rel="stylesheet">
	<!-- body -->
	<link href="//fonts.googleapis.com/css?family=Poppins:400,500,600,700,800" rel="stylesheet">


	<!-- Datatable JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.js" type="text/javascript" charset="utf-8"></script>
	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" type="text/javascript" charset="utf-8"></script>

	<!-- Datatable CSS -->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

	<!-- Scripts essenciais -->

	<!-- //Modal -->
	<!-- js-->
		<script src="{{ asset('js/jquery-2.2.3.min.js') }}"></script>
	<!-- js-->
	<!-- Banner Responsiveslides -->
		<script src="{{ asset('js/responsiveslides.min.js') }}"></script>
		<script>
			// You can also use "$(window).load(function() {"
			$(function () {
				// Slideshow 4
				$("#slider3").responsiveSlides({
					auto: true,
					pager: true,
					nav: false,
					speed: 500,
					namespace: "callbacks",
					before: function () {
						$('.events').append("<li>before event fired.</li>");
					},
					after: function () {
						$('.events').append("<li>after event fired.</li>");
					}
				});

			});
		</script>
	<!-- // Banner Responsiveslides -->
	<!-- stats -->
		<script src="{{ asset('js/jquery.waypoints.min.js') }}"></script>
		<script src="{{ asset('js/jquery.countup.js') }}"></script>
			<script>
				$('.counter').countUp();
			</script>
	<!-- //stats -->
	<!--pop-up-box -->
		<script src="{{ asset('js/jquery.magnific-popup.js') }}"></script>
		<script>
			$(document).ready(function () {
				$('.popup-with-zoom-anim').magnificPopup({
					type: 'inline',
					fixedContentPos: false,
					fixedBgPos: true,
					overflowY: 'auto',
					closeBtnInside: true,
					preloader: false,
					midClick: true,
					removalDelay: 300,
					mainClass: 'my-mfp-zoom-in'
				});
			});
		</script>
		<!-- //pop-up-box -->
		<!-- Bootstrap Core JavaScript -->
		<script src="{{ asset('js/bootstrap.js') }} ">
		</script>
		<!-- //Bootstrap Core JavaScript -->

	<!-- // Scripts essenciais -->

</head>
