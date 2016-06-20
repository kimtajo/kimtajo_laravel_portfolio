<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

	<title>TaJo Kim - @yield('title')</title>
	<!--Import materialize.css-->
	{!!Html::style('vendor/materialize/css/materialize.min.css')!!}
	{!!Html::style('custom/css/materialize.custom.css')!!}

	<!-- Fonts -->
	{!! Html::style('vendor/font-awesome/css/font-awesome.min.css') !!}
	<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	@yield('customCSS')
</head>
<body>
	@include('materialize.nav')
	@yield('parallax')
<main>
	<div class="container main">
		@yield('content')
	</div>
</main>
	@yield('login')

<!-- JavaScripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
{!! Html::script('vendor/materialize/js/materialize.js') !!}
@yield('customJS')
<script>
	$(document).ready(function () {
		$(".button-collapse").sideNav();
		$('.collapsible').collapsible({
			accordion : false // A setting that changes the collapsible behavior to expandable instead of the default accordion style
		});
		$('.scrollspy').scrollSpy();
	});
</script>
</body>
</html>
