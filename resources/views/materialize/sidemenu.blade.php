<header>
	<ul id="nav-mobile" class="side-nav fixed section table-of-contents">
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
		<li class="{!! Tajo::setActive('introduce') !!}"><a href="{!! url('introduce') !!}" class="waves-effect waves-blue"><i class="fa fa-user"></i> Introduce</a></li>
		<li class="{!! Tajo::setActive('skill') !!}"><a href="{!! url('skill') !!}" class="waves-effect waves-blue"><i class="fa fa-pie-chart"></i> Skill</a></li>
		<li class="{!! Tajo::setActive('portfolio') !!}"><a href="{!! url('portfolio') !!}" class="waves-effect waves-blue"><i class="fa fa-file-text"></i> Portfolio</a></li>
		<li class="{!! Tajo::setActive('board') !!}"><a href="{!! url('board') !!}" class="waves-effect waves-blue"><i class="fa fa-file-text"></i> Board</a></li>
		<li class="{!! Tajo::setActive('contact') !!}"><a href="{!! url('contact') !!}" class="waves-effect waves-blue"><i class="fa fa-envelope"></i> Contact</a></li>
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