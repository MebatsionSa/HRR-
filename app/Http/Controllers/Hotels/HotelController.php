<?php

namespace App\Http\Controllers\Hotels;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Comment;
use App\Hotel;
use App\Room;
use Illuminate\Support\Facades\Auth;

class HotelController extends Controller
{
     public function index($id,$number_of_comment=10)
     {
        $comments = Comment::with('user')->where('hotel_id',$id)->take($number_of_comment)->get();
        $hotel    = Hotel::findOrFail($id);
        $rooms    = Room::where('room_hotel_id',$id)->where('room_status',true)->get();
        return view('hotels.particular_hotel',[
        	'hotel'     => $hotel,
        	'comments'  => $comments,
        	'rooms'     => $rooms,
        ]);
     }




}
