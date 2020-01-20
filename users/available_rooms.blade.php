@extends('home')
@inject('profile','App\Extension\Common')
@section('main-content')
<main>
	@if($errors->any())
		<ul class="alert alert-danger">
		 @foreach($errors->all() as $error)
	       <li>{{$error}}</li>
		 @endforeach
		</ul>
	@endif

	@if(Session::has('error'))
	  @alert(['type'=>'alert-danger'])
	   {{Session::get('error')}}
	  @endalert
	@endif
	@if(isset($available_rooms))
		 @if($available_rooms->isNotEmpty())
		  <form method="post" action="{{route('Hotels.AddToPendingOrders')}}">
		  	@csrf
		    <div class="row">
		    	<div class="col-md-4">
		    		<div class="form-group">
		    			<label for="checkin"><b>Check In</b></label>
		    			<input type="text" name="checkin" class="datepicker form-control" data-provide="datepicker" id="checkin" required="required" data-date-format="yyyy-mm-dd" autocomplete="off">
		    		</div>
		    	</div>

		    	<div class="col-md-4">
		    		<div class="form-group">
		    			<label for="checkout"><b>Check Out</b></label>
		    			<input type="text" name="checkout" class="datepicker form-control" data-provide="datepicker" id="checkout" required="required" data-date-format="yyyy-mm-dd" autocomplete="off">
		    		</div>
		    	</div>
		    </div>

			<div class="row">
				<div class="col-md-8">
					<table class="table table-hover table-info table-responsive-md">
				       <thead>
				       	  <tr>
				       	  	 <th scope="col">Room Name</th>
				       	  	 <th scope="col">Description</th>
				       	  	 <th scope="col">Book</th>
				       	  </tr>
				       </thead>
				       <tbody>
						     @foreach($available_rooms as $room)
						       	   <tr class="mb-2">
						       	   	 <td>
						       	   	 	<h3>{{$room->room_name}}</h3>
						       	   	 	<img src="{{asset($profile->profilePicture('Room',$room->id))}}">
						       	   	 </td>

						       	   	 <td>
						       	   	 	<b>Price: <h2>{{$room->room_price}}</h2></b>
						       	   	 	<b>Description:<p>{{$room->room_description}}</p></b>
						       	   	 </td>

						       	   	 <td>
						       	   	 	<input type="checkbox" name="rooms[]" class="form-control" value="{{$room->id}}">
						       	   	 </td>
						       	   </tr>

						       	 @endforeach
		                    </form>
				       </tbody>
			        </table>
				</div>
				<div class="col-md-2 mt-5">
					<button class="btn btn-primary btn-block btn-lg">Book Now</button>
				</div>
			</div>
		 @endif
		 @else
		 <b class="text-warning">no registered room for this hotel</b>
	@endif
</main>
<script>

$('.datepicker').datepicker({
    format: 'mm-dd-yyyy',

});
// $('.datepicker').datepicker();

</script>
@endsection
