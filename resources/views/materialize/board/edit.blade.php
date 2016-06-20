@extends('layouts.materialize')
@section('title', "글수정 - $type")

@section('customCSS')
	{!! Html::style('vendor/ckeditor/skins/moono/editor.css') !!}
	{!! Html::style('vendor/ckeditor/skins/moono/dialog.css') !!}
@endsection

@section('content')

	<div class="row">
		<div class="col s12">
			@if(Auth::user() && Auth::user()->id == 1)
			{!! Form::open(array('url'=>route('board.update', $board->board_id), 'method'=>'put', 'files'=>true, 'class'=>'col s12')) !!}
			<input type="hidden" value="{{$type}}" name="board_name">
			<input type="hidden" value="{{$type}}/create?type={{$type}}" name="redirect_url">
			<input type="hidden" value="{!! $page !!}" name="page">
			<div class="row">
				<div class="input-field col s12">
					<input type="text" id="title" name="title" class="validate" value="{!! $board->title !!}">
					<label for="title">제목</label>
					@if($errors->has('title'))
						<div class="titleErr error">{{$errors->first('title')}}</div>
					@endif
				</div>
			</div>

			<div class="row">
				<div class="input-field col s6">
					<input id="startDate" name="startDate" type="date" class="datepicker" value="{!! !empty($terms->first())?$terms->first()->start_date:'' !!}">
					<label for="startDate">시작일시</label>
				</div>
				<div class="input-field col s6">
					<input id="endDate" name="endDate" type="date" class="datepicker" value="{!! !empty($terms->first())?$terms->first()->end_date:'' !!}">
					<label for="endDate">종료일시</label>
				</div>
			</div>

			<div class="row">
				<div class="input-field col s12">
					<textarea id="content" name="content">{!! $board->content !!}</textarea>
				</div>
			</div>
			<div class="row">
				<div class="input-field col s12">
					<input type="text" id="tags" name="tags" class="validate" value="{!! $tag_text !!}">
					<label for="tags">Tag</label>
				</div>
			</div>
			<div class="row">
				<div class="input-field col s12">
					<input type="submit" value="수정" class="waves-effect blue btn">
				</div>
			</div>
			{!! Form::close() !!}
			@else
				<div class="col s12">
					<div class="card">
						<div class="card-content">
							<span class="card-title">권한 없음</span>
							<p>관리자만 수정할 수 있습니다.</p>
						</div>
					</div>
				</div>
			@endif
		</div>
	</div>

@endsection


@section('customJS')
	{!! Html::script('vendor/ckeditor/ckeditor.js') !!}
	{!! Html::script('vendor/materialize/js/pickadate_ko_KR.js')  !!}
	<script>
		CKEDITOR.replace( 'content' , {
			height:"500",
			extraPlugins : 'uploadimage,image2',
			uploadUrl: '{!! route("imageUpload", ["_token"=>csrf_token(), 'board_name'=>$type]) !!}',
			stylesSet: [
				{ name: 'Narrow image', type: 'widget', widget: 'image', attributes: { 'class': 'image-narrow' } },
				{ name: 'Wide image', type: 'widget', widget: 'image', attributes: { 'class': 'image-wide' } }
			],
			contentsCss: [ CKEDITOR.basePath + 'contents.css', 'http://sdk.ckeditor.com/samples/assets/css/widgetstyles.css' ],
			image2_alignClasses: [ 'image-align-left', 'image-align-center', 'image-align-right' ],
			image2_disableResizer: true
		});
		$(document).ready(function () {
			$('.datepicker').pickadate({
				selectMonths: true, // Creates a dropdown to control month
				selectYears: 15 // Creates a dropdown of 15 years to control year
			});

		});
	</script>
@endsection