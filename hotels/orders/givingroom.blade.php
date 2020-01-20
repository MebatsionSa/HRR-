@extends('layouts.hotel.hotel_home')
@section('tittle')
    {{'Giving Room To The User'}}
    @endsection
@section('main-content')
    <div class="container">
         <div class="col-md-6">
             <div class="card">
                 <div class="card-header">
                     <h1>giving Room</h1>
                     <div class="card-body">
                         <form method="post">
                             @csrf
                             <div class="form-group">
                                 <label for="id_number">Id Number</label>
                                 <input class="form-control" placeholder="id number" required autofocus autocomplete="off" id="id_number" name="id_umber">
                             </div>

                             <div class="form-group">
                                 <label for="room_number">Room Number</label>
                                 <input type="number" class="form-control" required autofocus autocomplete="off" placeholder="room number" id="room_number" name="room_number">
                             </div>
                             <button class="btn btn-primary btn-block" type="submit">Give</button>
                         </form>
                     </div>

                 </div>
             </div>
         </div>
    </div>
    @endsection
