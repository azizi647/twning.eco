<!DOCTYPE html>
<html lang="en">
	<head>
	<title>@yield('title')</title>
	<meta charset="utf-8">
	<meta name = "format-detection" content = "telephone=no" />
	<link rel="icon" href="images/favicon.ico" type="image/x-icon">
	<link rel="stylesheet" href="{{asset('public/site_style/css/grid.css')}}">
	<link rel="stylesheet" href="{{asset('public/site_style/css/style.css')}}">
	<link rel="stylesheet" href="{{asset('public/site_style/css/camera.css')}}">
	<link rel="stylesheet" href="{{asset('public/site_style/css/owl.carousel.css')}}">
        @yield('css')
	<script src="{{asset('public/site_style/js/jquery.js')}}"></script>
	<script src="{{asset('public/site_style/js/jquery-migrate-1.2.1.js')}}"></script>
	<script src="{{asset('public/site_style/js/camera.js')}}"></script>
	<script src="{{asset('public/site_style/js/owl.carousel.js')}}"></script>
	<script src="{{asset('public/site_style/js/jquery.stellar.js')}}"></script>
	<script src="{{asset('public/site_style/js/script.js')}}"></script>
	<!--[if (gt IE 9)|!(IE)]><!-->
	<script src="{{asset('public/site_style/js/jquery.mobile.customized.min.js')}}"></script>
	<script src="{{asset('public/site_style/js/wow.js')}}"></script>
	<script>
		$(document).ready(function () {
			if ($('html').hasClass('desktop')) {
				new WOW().init();
			}
		});
	</script>
	<!--<![endif]-->
	<!--[if lt IE 8]>
	<div style=' clear: both; text-align:center; position: relative;'>
	 <a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode">
		 <img src="images/ie8-panel/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." />
	 </a>
	</div>
	<![endif]-->
	<!--[if lt IE 9]>
		<script src="js/html5shiv.js"></script>
		<link rel="stylesheet" type="text/css" media="screen" href="css/ie.css">
	<![endif]-->
        @yield('js')
	</head>
<body class="index">
 
@include('site.header.navbar')  

@yield('content')

@include('site.footer.footer') 
<script>
	jQuery(function(){
		jQuery('#camera_wrap').camera({
			height: '34.58333333333333%',
			thumbnails: false,
			pagination: true,
			fx: 'simpleFade',
			loader: 'none',
			hover: false,
			navigation: false,
			playPause: false,
			minHeight: "139px",
		});
	});
</script>
<script>
	$(document).ready(function() {
		$(".owl-carousel").owlCarousel({
			navigation: true,
			pagination: false,
			items : 3,
			itemsDesktop : [1199,3],
			itemsDesktopSmall : [979,3],
			itemsTablet: [750,1],
			itemsMobile : [479,1],
			navigationText: false
		});
	});
</script>
<script>
	$(document).ready(function() { 
			if ($('html').hasClass('desktop')) {
				$.stellar({
					horizontalScrolling: false,
					verticalOffset: 20,
					resposive: true,
					hideDistantElements: true,
				});
			}
		});
</script>
@yield('jsbottom')
</body>
</html>