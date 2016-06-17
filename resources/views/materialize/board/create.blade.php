@extends('layouts.materialize')
@section('title', "글쓰기 - $type")

@section('customCSS')
{!! Html::style('vendor/ckeditor/skins/moono/editor.css') !!}
{!! Html::style('vendor/ckeditor/skins/moono/dialog.css') !!}
@endsection

@section('content')
	<div class="row">
		<div class="col s12">
			{!! Form::open(array('url'=>route('board.index'),  'method'=>'post', 'files'=>true, 'class'=>'col s12')) !!}
			<input type="hidden" value="{{$type}}" name="board_name">
			<input type="hidden" value="{{$type}}/create?type={{$type}}" name="redirect_url">
			<div class="row">
				<div class="input-field col s12">
					<input type="text" id="title" name="title" class="validate">
					<label for="title">제목</label>
					@if($errors->has('title'))
						<div class="titleErr error">{{$errors->first('title')}}</div>
					@endif
				</div>
			</div>

			<div class="row">
				<div class="input-field col s6">
					<input id="startDate" name="startDate" type="date" class="datepicker">
					<label for="startDate">시작일시</label>
				</div>
				<div class="input-field col s6">
					<input id="endDate" name="endDate" type="date" class="datepicker">
					<label for="endDate">종료일시</label>
				</div>
			</div>

			<div class="row">
				<div class="file-field input-field">
					<div class="btn">
						<span>파일선택</span>
						<input type="file" name="thumbnail" id="thumbnail">
					</div>
					<div class="file-path-wrapper">
						<input class="file-path validate" type="text" placeholder="업로드 할 파일을 선택하세요.">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="input-field col s12">
					<textarea id="content" name="content"></textarea>
				</div>
			</div>
			<div class="row">
				<div class="input-field col s12">
					<input type="text" id="tags" name="tags" class="validate">
					<label for="tags">Tag</label>
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
	{!! Html::script('vendor/ckeditor/ckeditor.js') !!}
	{{--{{ Html::script("//cdn.ckeditor.com/4.5.9/full/ckeditor.js") }}--}}
	{!! Html::script('vendor/materialize/js/pickadate_ko_KR.js')  !!}
	<script>
//		CKEDITOR.replace( 'content' );
		CKEDITOR.replace( 'content' , {
			height:"500",
			extraPlugins : 'uploadimage,image2',
			uploadUrl: '{!! route("imageUpload", ["_token"=>csrf_token(), 'board_name'=>$type]) !!}',
			// The following options are not necessary and are used here for presentation purposes only.
			// They configure the Styles drop-down list and widgets to use classes.

			stylesSet: [
				{ name: 'Narrow image', type: 'widget', widget: 'image', attributes: { 'class': 'image-narrow' } },
				{ name: 'Wide image', type: 'widget', widget: 'image', attributes: { 'class': 'image-wide' } }
			],

			// Load the default contents.css file plus customizations for this sample.
			contentsCss: [ CKEDITOR.basePath + 'contents.css', 'http://sdk.ckeditor.com/samples/assets/css/widgetstyles.css' ],

			// Configure the Enhanced Image plugin to use classes instead of styles and to disable the
			// resizer (because image size is controlled by widget styles or the image takes maximum
			// 100% of the editor width).
			image2_alignClasses: [ 'image-align-left', 'image-align-center', 'image-align-right' ],
			image2_disableResizer: true
		});
//		CKEDITOR.fileUploadResponse();


		$(document).ready(function () {
			$('.datepicker').pickadate({
				selectMonths: true, // Creates a dropdown to control month
				selectYears: 15 // Creates a dropdown of 15 years to control year
			});

		});
	</script>
@endsection