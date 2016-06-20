@extends('layouts.materialize')
@section('title', "로그인")

@section('content')
	{!! Form::open(['url'=>url('/auth/login'), 'method'=>'POST']) !!}
	<div class="row">
	    <div class="col s8 offset-s2">
		    <div class="card white">
			    <div class="card-content">
				    <div class="row">
					    <div class="input-field col s12">
						    <input placeholder="E-mail Address" id="email" name="email" type="email" class="validate">
						    <label for="first_name">E-mail Address</label>
						    @if($errors->has('email'))
							    <div class="error">{{$errors->first('email')}}</div>
						    @endif
					    </div>
					    <div class="input-field col s12">
						    <input id="password" type="password" name="password" class="validate">
						    <label for="last_name">Password</label>
						    @if($errors->has('password'))
							    <div class="error">{{$errors->first('password')}}</div>
						    @endif
					    </div>
				    </div>
				    <div class="row">
					    <div class="col s12">
						    <p>
						        <input type="checkbox" id="remember" name="remember">
						        <label for="remember">Remember Me</label>
							    {{--<span class="right"> <a href="{{ url('/password/reset') }}">Forgot Your Password?</a></span>--}}
						    </p>
					    </div>
				    </div>
				    <div class="row">
					    <div class="col s6">
						    <button type="submit" class="waves-effect waves-light btn-large col s12"><i class="fa fa-btn fa-sign-in"></i> Login</button>
					    </div>
					    <div class="col s6">
						    <a href="{!! url('/register') !!}" class="waves-effect waves-light btn-large col s12"><i class="fa fa-btn fa-sign-up"></i> Sign Up</a>
					    </div>
				    </div>
			    </div>
		    </div>
	    </div>
    </div>
	{!! Form::close() !!}
@endsection