<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Laravel </title>
	<base href="{{asset('')}}">
	<link href='source/assets/dest/css/css_1.css' rel='stylesheet' type='text/css'>
	<link href='source/assets/dest/css/css_2.css' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="source/assets/dest/css/bootstrap.min.css">

	<link rel="stylesheet" href="source/assets/dest/css/font-awesome.min.css">
	<link rel="stylesheet" href="source/assets/dest/vendors/colorbox/example3/colorbox.css">
	<link rel="stylesheet" href="source/assets/dest/rs-plugin/css/settings.css">
	<link rel="stylesheet" href="source/assets/dest/rs-plugin/css/responsive.css">
	<link rel="stylesheet" title="style" href="source/assets/dest/css/style.css">
	<link rel="stylesheet" href="source/assets/dest/css/animate.css">
	<link rel="stylesheet" title="style" href="source/assets/dest/css/huong-style.css">
   <link rel="stylesheet" href="source/assets/dest/css/custom_style.css">
	<script src="source/assets/dest/js/jquery.js"></script>
	<script src="source/assets/dest/js/scripts.min.js"></script>
	<script src="source/assets/dest/js/bootstrap.min.js"></script>
	
</head>
<body>

	@include('user.layout.header')

	<div class="container">
		@yield('content')
	</div>
	@include('user.layout.footer')

	<div class="copyright">
		<div class="container">
			<p class="pull-left"> &copy; 2017 - Bản quyền thuộc về Công ty TNHH ShoesMarker</p>
			<div class="clearfix"></div>
		</div> <!-- .container -->
	</div> <!-- .copyright -->
	
	<script src="source/assets/dest/vendors/jqueryui/jquery-ui-1.10.4.custom.min.js"></script>
	<script src="source/assets/dest/vendors/bxslider/jquery.bxslider.min.js"></script>
	<script src="source/assets/dest/vendors/colorbox/jquery.colorbox-min.js"></script>
	<script src="source/assets/dest/vendors/animo/Animo.js"></script>
	<script src="source/assets/dest/vendors/dug/dug.js"></script>
	<script src="source/assets/dest/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
	<script src="source/assets/dest/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
	<script src="source/assets/dest/js/waypoints.min.js"></script>
	<script src="source/assets/dest/js/wow.min.js"></script>
	<script src="source/assets/dest/js/custom2.js"></script>	
</body>
</html>
