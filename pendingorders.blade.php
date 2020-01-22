@inject('room','App\Extension\Rooms')
@extends('home')
@section('tittle')
{{'Pending Orders'}}
@stop
@section('main-content')
<div class="container">
	@if(isset($pending_orders))
		@if($pending_orders->isNotEmpty())
	<table class="table table-responsive table-hover">
		<thead>
			<tr>
				<td scope="col">#</td>
				<td scope="col">City</td>
				<td scope="col">Hotel</td>
				<td scope="col">Room</td>
				<td scope="col">Price</td>
				<td scope="col">Pay</td>
				<td scope="col">Cancel</td>
			</tr>
		</thead>

		<tbody>
        @foreach($pending_orders as $order)
				     <tr>
				     	<td>
				     	{{(($pending_orders->currentPage()-1)*$pending_orders->perPage())+$loop->iteration}}
				       </td>

				       <td>
				       	 {{$order->hotelInfo->hotel_city}}
				       </td>

				       <td>
				       	{{$order->hotelInfo->hotel_name}}
				       </td>

				       <td>
				       	{{$order->roomInfo->room_name}}
				       </td>

				       <td>
				       	 {{$order->roomInfo->room_price}}
				       </td>

				       <td>
				       	 <a class="btn btn-primary btn-sm" href="{{route('Users.PaymentMethods',['id' => $order->id])}}">Pay</a>
				       </td>

				       <td>
				       	 <a class="btn btn-danger btn-sm" >Cancel</a>
				       </td>
				     </tr>
				   @endforeach
				   <tr>
				   	 <td></td>
				   	 <td></td>
				   	 <td></td>
				   	 <td></td>
				   	 <td>
				   	 	Total Price:{{$room->totalPriceOfPendingOrderForUser($pending_orders)}}</td>
				   	 <td>
				   	 	<a class="btn btn-primary btn-sm" href="{{route('Users.PaymentMethods',['id' => 'total'])}}">Pay</a>
				   	 </td>
				   	 <td>
				   	 	<button class="btn btn-danger btn-sm">Cancel</button>
				   	 </td>
				   </tr>
				   {{$pending_orders->links()}}
			   @else
			   no pending order
			 @endif
			@endif
		</tbody>
	</table>
</div>
@endsection
