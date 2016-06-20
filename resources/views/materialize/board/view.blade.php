@extends('layouts.materialize')
@section('title', "글읽기 - $type")

@section('customCSS')
	{!! Html::style('vendor/ckeditor/skins/moono/editor.css') !!}
	{!! Html::style('vendor/ckeditor/skins/moono/dialog.css') !!}
@endsection

@section('content')
	<div class="row">
		<div class="col s12">
			<div class="row">
				<div class="col s12">
					<h4>{!! $board->title !!}</h4>
				</div>
				<div class="col s12 right">
					<i class="fa fa-clock-o"></i> {!! $board->created_at !!}
					<i class="fa fa-eye"></i> {!! $board->visited_at !!}
				</div>
			</div>
			@if( !empty($term) )
			<div class="row">
				<div class="col s12">
					<i class="fa fa-calendar"></i> {!! $term->start_date !!} ~ {!! $term->end_date !!}
				</div>
			</div>
			@endif

			<div class="row">
				<div class="col s12 white">
					{!! $board->content !!}
				</div>
			</div>
			<div class="row">
				<div class="col s12">
					@foreach($tags as $tag)
						<div class="chip blue white-text"> {!! $tag->tag_name !!} </div>
					@endforeach
					@if($tags->isEmpty())
						<div class="chip red white-text"> No Tags </div>
					@endif
				</div>
			</div>
			<div class="row">
				<div class="col s12">
					@if(Auth::user() && Auth::user()->id == 1)
						{!! Form::open(['url'=>route('board.destroy', $board->board_id), 'method'=>'delete']) !!}
						<a href="{!! route('board.edit', $board->board_id) !!}?page={!! $page !!}" class="waves-effect green btn">수정</a>
						<a href="{!! url($type) !!}?page={!! $page !!}" class="waves-effect blue btn">목록</a>
						<button class="waves-effect red btn">글 삭제</button>
						{!! Form::close() !!}
					@else
						<a href="{!! url($type) !!}?page={!! $page !!}" class="waves-effect blue btn">목록</a>
					@endif
				</div>
			</div>
		</div>
	</div>
@endsection

