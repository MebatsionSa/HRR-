@extends('layouts.hotel.hotel_header')
@section('tittle')
    @parent
    {{ "LogIn"}}
@stop
@section('content')
    <div class="container " style="margin-top: 100px;">
        @if(Session::has('login_error'))
            @alert(['type'=>'alert-danger'])
            {{LOG_IN_ERROR}}
            @endalert
        @endif
        @if(Session::has('logout_message'))
            @alert(['type'=>'alert-success'])
            {{LOG_OUT_MESSAGE}}
            @endalert
        @endif
        <div class="card col-md-5 m-auto mt-5">
            <div class="card-header">
                Admin Log In Page
            </div>
            <div class="card-body">
                <form method="POST" action="{{route('Admin.HandleLogIn')}}">
                    @csrf
                    <div class="form-group">
                        <label for="email">E-Mail</label>
                        <input type="email" name="email" required="required" id="email" class="form-control @error('email') is-invalid @enderror " autofocus="autofocus">
                    </div>
                    @error('email')
                    <span class="invalid-feedback">
 				  	<strong>{{$message}}</strong>
 				  </span>
                    @enderror
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" required="required"  class="form-control @error('password') is-invalid @enderror">
                    </div>
                    @error('password')
                    <span class="invalid-feedback">
 				  	<strong>{{$message}}</strong>
 				  </span>
                    @enderror

                    <button class="btn btn-primary btn-block " type="submit">Sign In</button><br>

                </form>
                <div class="card-footer">
                    <a href="#">Forgot Password</a>
                </div>
            </div>
        </div>
    </div>
@endsection
