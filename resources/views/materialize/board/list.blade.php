@extends('layouts.materialize')
@section('title', $title)


@section('content')

	<div class="row">
		@if(!$boards->isEmpty())
			@foreach($boards as $board)

				<div class="col s6">
					<div class="card">
						<div class="card-image waves-effect waves-block waves-light">
							{!! Html::image($board->thumbnail, 'alt', ['class'=>'activator']) !!}
						</div>
						<div class="card-content">
							<span class="card-title activator grey-text text-darken-4">
								{!! $board->title !!}
								<i class="material-icons right">more_vert</i></span>
							</span>
							<p>
								<a href="#">자세히</a>
							</p>
						</div>
						<div class="card-reveal">
							<span class="card-title grey-text text-darken-4">{!! $board->title !!}<i class="material-icons right">close</i></span>
							<p>{!! ($board->content) !!}</p>
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
	<div class="row">
		<div class="input-field col ">
			<a href="{{ route('board.create', ['type'=>$search]) }}" class="waves-effect blue btn"> 글쓰기</a>
		</div>
	</div>


	{{--{!! $boards->render() !!}--}}
	{!! (new Landish\Pagination\Materialize($boards))->render() !!}

@endsection
