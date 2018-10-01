<!DOCTYPE html>
<html lang="en" >
<!-- begin::Head -->
<head>
	<meta charset="utf-8" />
	<title>App</title>
	<meta name="description" content="Blank inner page examples">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
	<!--begin::Web font -->
	<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
	<script>
		WebFont.load({
		google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
		active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>
	<!--end::Web font -->
	<!--begin::Base Styles -->
	<link href="theme/assets/vendors/base/vendors.bundle.css" rel="stylesheet" type="text/css" />
	<!--RTL version:<link href="theme/assets/vendors/base/vendors.bundle.rtl.css" rel="stylesheet" type="text/css" />-->
	<link href="theme/assets/demo/demo12/base/style.bundle.css" rel="stylesheet" type="text/css" />
	<!--RTL version:<link href="theme/assets/demo/demo12/base/style.bundle.rtl.css" rel="stylesheet" type="text/css" />-->
	<!--end::Base Styles -->
	<link rel="shortcut icon" href="theme/assets/demo/demo12/media/img/logo/favicon.ico" />
</head>
<!-- end::Head -->
<!-- begin::Body -->
<body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >
	<div id="app">
	</div>
	<!--begin::Base Scripts -->        
	<script src="theme/assets/vendors/base/vendors.bundle.js" type="text/javascript"></script>
	<script src="app/dist/build.js" type="text/javascript"></script>
	<!--end::Base Scripts -->   
</body>
<!-- end::Body -->
</html>