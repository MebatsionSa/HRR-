<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
     protected  $table = 'bookings';
     protected  $guarded = [];

     public function hotelInfo()
     {
     	return $this->hasOne('App\Hotel','id','hotel_id');
     }

     public function roomInfo()
     {
     	return $this->hasOne('App\Room','id','room_id');
     }

     public function userInfo(){

         return $this->hasOne('App\User','id','user_id');
     }

     protected $dates =[
         'check_in',
         'check_out'
     ];
}
