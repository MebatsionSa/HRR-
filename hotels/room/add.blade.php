@extends('layouts.hotel.hotel_home')
@section('tittle')
 Hotel Adding
@stop
@section('main-content')
 <div class="container">
 	@if(Session::has('success'))
 	 @alert(['type'=>'alert-success'])
      {{Session::get('success')}}
 	 @endalert
 	@elseif(Session::has('error'))
 	 @alert(['type'=>'alert-danger'])
 	  {{Session::get('error')}}
 	 @endalert
 	@endif
 	<div class="card col-md-6">
 		<div class="card-header bg-info mt-1">
 			Room Adding
 		</div>
 		<div class="card-body">
 			<form method="POST"  action="{{route('Hotels.AddRoom')}}" enctype="multipart/form-data">
 				@csrf
 				<div class="form-group">
 					<label for="room_name"><b>Room Name(Type)</b></label>
 					<input type="text" name="room_name" id="room_name" value="{{old('room_name')}}" class="form-control @error('room_name') is-invalid @enderror" required="required" autofocus="autofocuss">
 					@error('room_name')
 					 <span class="invalid-feedback">
 					 	<strong>{{$message}}</strong>
 					 </span>
 					@enderror
 				</div>

 				<div class="form-group">
 					<label for="room_price"><b>Room Price</b></label>
 					<input type="number" name="room_price" value="{{old('room_price')}}" class="form-control @error('room_price') is-invalid @enderror" required="required" >
 					@error('room_price')
 					 <span class="invalid-feedback">
 					 	<strong>{{$message}}</strong>
 					 </span>
 					@enderror
 				</div>

 				<div class="form-group">
 					<label for="room_image"><b>Room Image</b></label>
 					<input type="file" name="room_image" id="room_image" class="form-control-file @error('room_image') is-invalid @enderror" value="{{old('room_image')}}" required="required">
 					@error('room_image')
 					 <span class="invalid-feedback">
 					 	<strong>{{$message}}</strong>
 					 </span>
 					@enderror
 				</div>

 				<div class="form-group">
 					<label for="room_number"><b>Number Of Rooms</b></label>
 					<input type="number" name="room_number" id="room_number" required="required" value="{{old('room_number')}}" required="required" class="form-control @error('room_number') is-invalid @enderror" >

 					@error('room_number')
 					 <span class="invalid-feedback">
 					 	<strong>{{$message}}</strong>
 					 </span>
 					@enderror
 				</div>

 				<div class="form-group">
 					<label for="description"><b>Room Description</b></label>
 					<textarea class="form-control  @error('description') is-invalid @enderror" cols="44" required="required" name="description" value="{{old('description')}}" >
 					</textarea>
                    
                    @error('description')
 					 <span class="invalid-feedback">
 					 	<strong>{{$message}}</strong>
 					 </span>
 					@enderror

 				</div>
 				<button class="btn btn-success btn-block" type="submit">Add</button>
 			</form>
 		</div>
 	</div>
 </div>
@endsection