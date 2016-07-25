@extends('layouts.materialize')
@section('title', 'Introduce')

@section('content')
	<div class="row center">
		<div class="col s12 m8">
			<h2 class="header indigo-text lighten-1 section-title">
				<span><i class="mdi-hardware-keyboard-alt"></i>About Me</span>
			</h2>

			<p class="flow-text">
				Hello! I'm <strong class="indigo-text  darken-4">Parminder Singh Klair</strong> and I am a <strong>Website
					and Application Developer</strong> based in
				Birmingham, UK. I enjoy working on <strong class="indigo-text lighten-1">usable, clean and
					practical</strong> web sites.
			</p>
		</div>
		<div class="col s12 m4">
			<h2 class="header indigo-text lighten-1 section-title">
                        <span>
                            <a href="/tweets">
                                <i class="fa fa-twitter"></i>Latest Tweets
                            </a>
                        </span>
			</h2>

			<div class="tweet-card card-panel indigo lighten-4">
          <span class="text-grey darken-4">
              <i class="fa fa-twitter twitter"></i>
              RT @mipsytipsy: "Serverless": a fancy word for "outsourced with an API you probably can't ssh to".  💣
          </span>
          <span class="ago">
              a month ago
          </span>
			</div>

		</div>
	</div>
@endsection

@section('customJS')
	<script>
		$(document).ready(function(){
			$('.collapsible').collapsible({
				accordion : false // A setting that changes the collapsible behavior to expandable instead of the default accordion style
			});
		});
	</script>
@endsection