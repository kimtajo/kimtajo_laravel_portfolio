<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

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
@section('navbar')
	<header>
		<ul id="nav-mobile" class="side-nav fixed">
			<li class="logo">
				<a id="logo-container" href="/" class="blue-text">
					<div class="row valign-wrapper">
						<div class="col s2">
							{!! Html::image('test/img/myface.png', null, array('class'=>'circle myface')) !!}
						</div>
						<div class="col s10">
							<h5>TaJo Kim</h5>
						</div>
					</div>
				</a>
			</li>
			{{--<li class="{!! Tajo::setActive('introduce') !!}"><a href="{!! url('introduce') !!}" class="waves-effect waves-blue"><i class="fa fa-user"></i> Introduce</a></li>--}}
			<li class="{!! Tajo::setActive('skill') !!}"><a href="{!! url('skill') !!}" class="waves-effect waves-blue"><i class="fa fa-pie-chart"></i> Skill</a></li>
			<li class="{!! Tajo::setActive('portfolio') !!}"><a href="#" class="waves-effect waves-blue"><i class="fa fa-file-text"></i> Portfolio</a></li>
			<li class="{!! Tajo::setActive('board') !!}"><a href="#" class="waves-effect waves-blue"><i class="fa fa-file-text"></i> Board</a></li>
			<li class="{!! Tajo::setActive('contact') !!}"><a href="#" class="waves-effect waves-blue"><i class="fa fa-envelope"></i> Contact</a></li>
			<li class="no-padding">
				<ul class="collapsible collapsible-accordion">
					<li>
						<a class="collapsible-header">Admin Menu<i class="mdi-navigation-arrow-drop-down"></i></a>
						<div class="collapsible-body">
							<ul>
								<li><a href="#!"><i class="fa fa-sign-in"></i> Login</a></li>
							</ul>
						</div>
					</li>
				</ul>
			</li>
		</ul>
	</header>
	<div class="fixed-action-btn hide-on-large-only" style="bottom: 45px; right: 24px;">
		<a class="btn-floating btn-large red">
			<i class="large material-icons">add</i>
		</a>
		<ul>
			<li><a data-activates="nav-mobile" class="btn-floating green button-collapse"><i class="material-icons">menu</i></a></li>
			<li><a class="btn-floating yellow darken-1"><i class="material-icons">mode_edit</i></a></li>
		</ul>
	</div>
@show
<main>
	@yield('content')
</main>

<!-- JavaScripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
{!! Html::script('vendor/materialize/js/materialize.min.js') !!}
@yield('customJS')
<script>
	$(document).ready(function () {
		$(".button-collapse").sideNav();
		$('.collapsible').collapsible({
			accordion : false // A setting that changes the collapsible behavior to expandable instead of the default accordion style
		});
	});
</script>
</body>
</html>
