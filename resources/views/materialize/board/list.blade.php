@extends('layouts.materialize')
@section('title', $title)


@section('content')

	<div class="row">
		@if(!$boards->isEmpty())
			@foreach($boards as $board)
				<div class="col m6 s12">
					<div class="card large">
						<div class="card-image waves-effect waves-block waves-light">
							@if($board->thumbnail)
							{!! Html::image($board->thumbnail, 'alt', ['class'=>'activator']) !!}
							@else
								{!! Html::image('no_image.png', 'alt', ['class'=>'activator']) !!}
							@endif
						</div>
						<div class="card-content">
							<span class="card-title activator grey-text text-darken-4">
								{!! Tajo::cutMessage($board->title, 30) !!}
								{{--<i class="material-icons right">more_vert</i>--}}
							</span>
							@if($board->terms->first())
							<h6><i class="fa fa-calendar"></i> {!! $board->terms->first()->start_date !!} ~ {!! $board->terms->first()->end_date !!}</h6>
							@endif
							<h6>
								<a href="{!! route('board.show', ['id'=>$board->board_id, 'type'=>$type, 'page'=>Request::input('page')]) !!}">자세히</a>
							</h6>
						</div>

						<div class="card-action">
							@if($board->tags)
								@foreach($board->tags as $tag)
									<div class="chip blue white-text"> {!! $tag->tag_name !!} </div>
								@endforeach
							@endif
							@if($board->tags->isEmpty())
								<div class="chip red white-text"> No Tags </div>
							@endif
						</div>

						<div class="card-reveal">
							<span class="card-title grey-text text-darken-4">{!! $board->title !!}<i class="material-icons right">close</i></span>
							@if($board->terms->first())
								<h6><i class="fa fa-calendar"></i> {!! $board->terms->first()->start_date !!} ~ {!! $board->terms->first()->end_date !!}</h6>
							@endif
							<p>{!! Tajo::removeImage($board->content) !!}</p>
						</div>
					</div>
				</div>
			@endforeach
		@else
			<div class="col s12">
				<div class="card">
					<div class="card-content">
						<span class="card-title">{{ $title }} 자료 없음</span>
						<p>{{ $title }} 자료가 존재하지 않습니다. 글을 작성해주시길 바랍니다.</p>
					</div>
				</div>
			</div>
		@endif
	</div>
	@if(Auth::user() && Auth::user()->id == 1)
	<div class="row right">
		<div class="input-field col s12">
			<a href="{{ route('board.create', ['type'=>$type]) }}" class="waves-effect blue btn"> 글쓰기</a>
		</div>
	</div>
	@endif
	<div class="row clear center">
		{!! (new Landish\Pagination\Materialize($boards))->render() !!}
	</div>

@endsection

