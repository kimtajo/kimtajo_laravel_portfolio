@extends('layouts.materialize')
@section('title', "로그인")


@section('content')
<div class="row">
    {!! Form::open(['url'=>url('/auth/register'), 'method'=>'post']) !!}
    <div class="col s8 offset-s2">
	    <div class="card white">
		    <div class="card-content">
			    <div class="card-title">Register</div>
			    <div class="row">
					<div class="input-field col s12">
						<input type="text" id="name" name="name" value="{!! old('name') !!}">
						<label for="name">Name</label>
						@if($errors->has('name'))
							<div class="error">{{$errors->first('name')}}</div>
						@endif
					</div>
					<div class="input-field col s12">
						<input type="email" id="email" name="email" value="{!! old('email') !!}">
						<label for="email">E-Mail Address</label>
						@if($errors->has('email'))
							<div class="error">{{$errors->first('email')}}</div>
						@endif
					</div>
					<div class="input-field col s12">
						<input type="password" id="password" name="password">
						<label for="email">Password</label>
						@if($errors->has('password'))
							<div class="error">{{$errors->first('password')}}</div>
						@endif
					</div>
					<div class="input-field col s12">
						<input type="password" id="password-confirm" name="password_confirmation" value="{!! old('email') !!}">
						<label for="password-confirm">Confirm Password</label>
						@if($errors->has('password_confirmation'))
							<div class="error">{{$errors->first('password_confirmation')}}</div>
						@endif
					</div>
				    <div class="col s6 offset-s4">
					    <button type="submit" class="btn btn-primary">
						    <i class="fa fa-btn fa-user"></i> Register
					    </button>
				    </div>
			    </div>
		    </div>
	    </div>
    </div>
    {!! Form::close() !!}
</div>
@endsection
