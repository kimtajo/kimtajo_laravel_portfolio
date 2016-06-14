@extends('layouts.materialize')
@section('title', "글쓰기 - $type")

@section('customCSS')

@endsection

@section('content')
	<div class="row">
		<div class="col s12">
			{!! Form::open(array('url'=>'board',  'method'=>'post', 'files'=>true, 'class'=>'col s12')) !!}
			<input type="hidden" value="{{$type}}" name="board_name">
			<input type="hidden" value="{{$type}}/create?type={{$type}}" name="redirect_url">

				<div class="input-field col s12">
					<input id="title" name="title" class="validate" data-error=".titleErr">
					<label for="title">제목</label>
					@if($errors->has('title'))
						<div class="titleErr error">{{$errors->first('title')}}</div>
					@endif
				</div>
				<div class="input-field col s6">
					<input id="startDate" name="startDate" type="date" class="datepicker">
					<label for="startDate">시작일시</label>
				</div>
				<div class="input-field col s6">
					<input id="endDate" name="endDate" type="date" class="datepicker">
					<label for="endDate">종료일시</label>
				</div>
			<div class="row">
				<div class="input-field col s12">
					<textarea id="contents" name="contents"></textarea>
				</div>
			</div>
			<div class="row">
				<div class="input-field col s12">
					<input type="submit" value="저장" class="waves-effect blue btn">
			</div>
		{!! Form::close() !!}
	</div>


@endsection


@section('customJS')
	{{ Html::script('vendor/ckeditor/ckeditor.js') }}
	{{--{{ Html::script("//cdn.ckeditor.com/4.5.9/full/ckeditor.js") }}--}}
	{{ Html::script('vendor/materialize/js/pickadate_ko_KR.js') }}
	<script>
		var csrf_token = '{{csrf_token()}}';
//		CKEDITOR.replace( 'contents' );
		CKEDITOR.replace( 'contents' , {
			extraPlugins : 'uploadimage',
			uploadUrl: '{{ route("imageUpload", ["_token"=>csrf_token(), 'board_name'=>$type]) }}',
		});



		$(document).ready(function () {
			$('.datepicker').pickadate({
				selectMonths: true, // Creates a dropdown to control month
				selectYears: 15 // Creates a dropdown of 15 years to control year
			});

		});
	</script>
@endsection