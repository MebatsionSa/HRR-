@extends('layouts.hotel.hotel_home')
@section('tittle')
    {{'ToDay Check In Date'}}
    @endsection
@section('main-content')
    <div class="container">

        <div class="row">
            <div class="col-md-7">
                <form method="get" action="{{route('Hotels.SearchTodayCheckin')}}">
                    <div class="form-group form-inline">
                        <label for="order_id"></label>
                        <input type="text" class="form-control" placeholder="search by order id" autofocus required autocomplete="off" name="order_id">
                        <button class="btn  btn-primary ml-1" type="submit">Search</button>
                    </div>
                </form>
                @if($today_checkin->isNotEmpty())
                    <table class="table table-hover table-responsive">
                        <thead>
                        <th scope="col">Order Id</th>
                        <th scope="col">Full Name</th>
                        <th scope="col">Check In</th>
                        <th scope="col">Check Out</th>
                        <th scope="col">Room Type</th>
                        <th scope="col">Verification Key</th>
                        <th scope="col">Room Status</th>
                        </thead>

                        <tbody>
                           @foreach($today_checkin as $order)
                                <tr>
                                    <td>{{$order->id}}</td>
                                    <td>{{$order->userInfo->name}}</td>
                                    <td>{{$order->check_in}}</td>
                                    <td>{{$order->check_out}}</td>
                                    <td>{{$order->roominfo->room_name}}</td>
                                    <td>12</td>
                                    <td>
                                        <a class="btn btn-success btn-sm" href="{{route('Hotels.GivingRoom',['order_id' => $order
                                        ->id])}}">Give Room</a>
                                    </td>
                                    <td></td>

                                </tr>
                               @endforeach
                        </tbody>

                    </table>
                    @else
                       No To Day Checkin Now !!!
                    @endif
            </div>
        </div>
    </div>
@endsection
