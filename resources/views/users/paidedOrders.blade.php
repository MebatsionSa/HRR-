@extends('home')
@section('tittle')
    {{"Paided Orders"}}
    @endsection
@section('main-content')
    <main>
        <div class="container">
            @if(isset($paided_orders))
                @if($paided_orders->isNotEmpty())
                    @foreach($paided_orders as $orders)
                        <div class="card card-inverse mb-2">
                            <div class="card-header">
                                {{$orders->roomInfo->room_name}}
                            </div>

                            <div class="card-body">
                                <div class="card-text">
                                   <p>
                                       <b>From :</b>{{ $orders->check_in }}
                                       <b>to:</b>{{ $orders->check_out }}
                                   </p>

                                   <p>
                                       <b>Hotel Name:</b>{{ $orders->hotelInfo->hotel_name }}
                                   </p>
                                   <p>
                                       <b>Hotel City:</b>{{ $orders->hotelInfo->hotel_city }}
                                   </p>
                                    <p>
                                        <b>Total Price:</b>{{ $orders->price }}
                                    </p>

                                    <p>
                                        <b>Status:{{check_status_ofusers($orders->check_out)}}</b>
                                    </p>

                                   <p>
                                       Approvation key:
                                   </p>
                                </div>
                            </div>


                        </div>
                        @endforeach
                     {{ $paided_orders->links() }}
                    @else
                    No paided Order!!
                    @endif
                @else
                No Paided Order
                @endif
        </div>
    </main>
    @endsection
