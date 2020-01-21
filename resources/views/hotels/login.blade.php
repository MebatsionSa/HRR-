//Login part for the hotels
//Front end

@extends('layouts.hotel.hotel_header')
@section('tittle')
@parent
 {{ "Log In"}}
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
 			Hotel Log In Page
 		</div>
 		<div class="card-body">
 			<form method="POST" action="{{route('Hotels.LogIn')}}">
 				@csrf
 				<div class="form-group">
 					<label for="hotel_email">E-Mail</label>
 					<input type="email" name="hotel_email" required="required" id="hotel_email" class="form-control @error('hotel_email') is-invalid @enderror " autofocus="autofocus">
 				</div>
 				@error('hotel_email')
 				  <span class="invalid-feedback">
 				  	<strong>{{$message}}</strong>
 				  </span>
 				@enderror
 				<div class="form-group">
 					<label for="hotel_password">Password</label>
 					<input type="password" name="hotel_password" id="hotel_password" required="required" value="{{old('hotel_password')}}" class="form-control @error('hotel_password') is-invalid @enderror">
 				</div>
 				@error('hotel_password')
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
