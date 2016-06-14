@extends('layouts.materialize')
@section('title', 'Introduce')
@section('content')

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