@extends('layouts.hotel.hotel_home')
@section('tittle')
    {{'All Orders Of The Hotel'}}
@endsection
@section('main-content')
    @php
        $hotel  = hotel_logged_in();
    @endphp
    @if(!($hotel->hotel_status))
        @alert(['type'=>'alert-success'])
        {{UN_APPROVED_MESSAGE }}
        @endalert
    @else
    @endif
    <main>
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    @if($all_orders->isNotEmpty())
                         <table class="table table-responsive table-hover">
                             <thead>
                             <th scope="col">Order ID</th>
                             <th scope="col">Full Name</th>
                             <th scope="col">check In</th>
                             <th scope="col">check out</th>
                             <th scope="col">status</th>
                             <th scope="col">room type</th>
                             <th scope="col">verification key</th>
                             </thead>

                             <tbody>
                                @foreach($all_orders as $order)
                                    <tr>
                                        <td>{{$order->id}}</td>
                                        <td>{{$order->userInfo->name}}</td>
                                        <td>{{$order->check_in}}</td>
                                        <td>{{$order->check_out}}</td>
                                        <td>active</td>
                                        <td>{{$order->roomInfo->room_name}}</td>
                                        <td>12</td>
                                    </tr>

                                @endforeach
                             </tbody>

                         </table>
                          {{$all_orders->links()}}
                        @else
                          No orders
                        @endif
                </div>
            </div>
        </div>
    </main>
@endsection
