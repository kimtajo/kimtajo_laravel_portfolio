@extends('layouts.materialize')
@section('title', $title)


@section('content')

	<div class="row">
		@if(!$boards->isEmpty())
			@foreach($boards as $board)
				<div class="col s3">
					<div class="card">
						<div class="card-image">
							{!! Html::image('test/img/sample-1.jpg') !!}
							<span class="card-title">카드 타이틀</span>
						</div>
					</div>
					<div class="card-content">
						<p>카드카드카드다다다~~~</p>
					</div>
					<div class="card-action">
						<a href="#">자세히</a>
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
