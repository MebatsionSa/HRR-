@inject('profile','App\Extension\Common')
@extends('home')
@section('main-content')
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-6">
				<div class="card">
					<div class="card-header">
						{{$hotel->hotel_name}}
					</div>
					<div class="card-img-top">
						<img src="{{$profile->profilePicture('Hotel',$hotel->id)}}">
					</div>
					<div class="card-body">
						<p class="card-text">City:<b>{{$hotel->hotel_city}}</b></p>
						<p class="card-text">Type:<b>{{$hotel->hotel_type}}</b></p>
						<p class="card-text">Phone:<b>{{$hotel->hotel_phone_number}}</b></p>
						<p class="card-text">Rate:<b>No Rated</b></p>
					</div>
					<div class="card-link  m-auto">
						<a href="{{route('Hotels.StartBookingView',['hotel_id' => $hotel->id])}}" class="btn btn-block btn-primary text-white">Start Booking</a>
					</div>
					<br>
				</div>
                @if(Session::has('comment'))
                    @alert(['type'=>'alert-success'])
                         {{Session::get('comment')}}
                    @endalert
                    @endif
				<form method="POST" action="{{ route('Users.Comment',['hotel_id' => $hotel->id]) }}">
                    @csrf
					<div class="form-group" >
						<label for="comment">Leave Your Comment</label>
						<textarea cols="" name="comment" id="comment" class="form-control"></textarea><br>
							<button class="btn btn-primary" type="submit">Comment</button>
					</div>
				</form>
				@isset($comments)
                    @if($comments->isNotEmpty())
                        @foreach($comments as $comment)
                            <div class="container-fluid">
                                <span>
                                    <p>
                                    <img src="{{$profile->profilePicture('User',$hotel->id)}}" width="25px" height="25px">
                                        {{$comment->user->name}}
                                    </p>
                                    <p>{{$comment->comment}}</p>
                                </span>
                            </div>
                            @endforeach
                        @endif
                    @endisset
			</div>

			<div class="col-md-6">
				<a class="btn btn-block btn-success mb-1" href="#">Available Room Type</a>
				@foreach($rooms as $room)
				 <div class="card card-info">
				 	<div class="card-header bg-info text-white">
				 		{{$room->room_name}}
				 	</div>
				 	<div class="card-img-top">
				 		<img src="{{asset($profile->profilePicture('Room',$room->id))}}" alt="Room Picture">
				 	</div>

				 	<div class="card-body">
				 		<div class="card-text">
				 			<p class="text-capitalize"><b class="text-success">Price:</b> {{$room->room_price}} Birr Per Day</p>
				 			<p class="text-capitaliz"><b class="text-success">Description:</b></p>
				 			<div class="font-italic font-weight-bold">
				 				{{$room->room_description}}
				 			</div>
				 		</div>
				 	</div>
				 </div>
				@endforeach
			</div>
		</div>
	</div>
@endsection
