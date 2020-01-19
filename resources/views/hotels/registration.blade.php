@extends('layouts.hotel.hotel_header')
@section('content')
<div class="container row">
	<div class="card col-md-6 m-auto mt-1">
		@if(Session::has('registration_error'))
		 <div class="alert alert-danger bg-danger">
		 	{{Session::get('registration_error')}}
		 </div>
		@endif
		<div class="card-header bg-white text-dark mt-1">
			Hotel Registration
		</div>
		<div class="card-body ">
		 <form method="POST" action="{{route('Hotels.Register')}}">
		 	@csrf
			<div class="form-group">
				<label for="hotel_name">Hotel Name</label><br/>
				<input type="text" name="hotel_name" id="hotel_name" required="required" value="{{old('hotel_name')}}" class="form-control @error('hotel_name') is-invalid @enderror" placeholder="hotel name" autofocus="autofocus">
				@error('hotel_name')
				 <span class="invalid-feedback" role="alert">
				 	<strong>{{$message}}</strong>
				 </span>
				@enderror
			</div>

			<div class="form-group">
				<label for="hotel_email">E-mail Address</label><br/>
				<input type="email" name="hotel_email" id="hotel_email" class="form-control @error('hotel') is-invalid @enderror" required="required" value="{{old('hotel_email')}}" placeholder="e-mail address">
				@error('hote_email')
				 <span class="invalid-feedback">
				 	<strong>{{$message}}</strong>
				 </span>
				@enderror
			</div>
			<div class="form-group">
				<label for="hotel_phone_number">Phone Nomber</label><br/>
				<input type="text" name="hotel_phone_number" id="hote_phone_number" required="required" class="form-control @error('hotel_phone_number') is-invalid @enderror" placeholder="Phone Number" value="{{old('hotel_phone_number')}}">
				@error('hotel_phone_number')
				  <span class="invalid-feedback">
				  	<strong>{{$message}}</strong>
				  </span>
				@enderror
			</div>

			<div class="form-group">
				<label for="hotel_city">Select City</label>
				<select id="hotel_city" name="hotel_city" required="required" class="form-control">
					<option>Bahirdar</option>
					<option>Adama</option>
					<option>Addis Ababa</option>
					<option>Hawasa</option>
					<option>Diredwa</option>
					<option>Arba Minch</option>
				</select>
				@error('hotel_city')
	             <span class="invalid-feedback">
	             	<strong>{{$message}}</strong>
	             </span>
	            @enderror
			</div>

			<div class="form-group">
				<label for="hotel_type">Hotel Type</label>
				<select id="hotel_type" name="hotel_type" required="required" class="form-control">
					<option>One Star</option>
					<option>Two Star</option>
					<option>Three Star</option>
					<option>Four Star</option>
					<option>Five Star</option>
					<option>Other</option>
				</select>
				@error('hotel_type')
	             <span class="invalid-feedback">
	             	<strong>{{$message}}</strong>
	             </span>
	            @enderror
			</div>

			<div class="form-group">
				<label for="hotel_password">Password</label>
				<input type="password" name="hotel_password" id="hotel_password" required="required" class="form-control @error('hotel_password') is-invalid @enderror">
				@error('hotel_password')
				 <span class="invalid-feedback">
				 	<strong >{{$message}}</strong>
				 </span>
				@enderror
			</div>

			<div class="form-group">
				<label for="hotel_password_confirmation">Confirm Password</label>
				<input type="Password" name="hotel_password_confirmation" id="hotel_password_confirmation" required="required" class="form-control @error('hotel_password_confirmation') is-invalid @enderror">
				@error('hotel_password_confirmation')
				 <span class="invalid-feedback">
				 	<strong>{{$message}}</strong>
				 </span>
				@enderror
			</div>
			<div class="card-footer">
				<button class="btn btn-block btn-primary" type="submit">Register</button>
			</div>
		 </form>
		</div>
	</div>
</div>
@endsection
