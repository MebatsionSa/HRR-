<?php

namespace App\Http\Controllers\Hotels;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Repository\RoomInterface;
use App\Booking;
class HotelBookingController extends Controller
{
	private $room;
	private $checkin;
	private $checkout;
	private $date_difference;
    public function index(RoomInterface $rooms,$id)
    {
       $available_rooms = $rooms->AllRoom($id);
       return view('users.available_rooms',['available_rooms' => $available_rooms]);
    }

    public function booking(Request $request,RoomInterface $singleRoom)
    {
    	$request->validate([

          'checkin' => 'required|date_format:Y-m-d',
          'checkout' => 'required|date_format:Y-m-d',
          'rooms'    => 'required',
    	]);

        $check_in = Carbon::create($request->checkin);
        $check_out = Carbon::create($request->checkout);

    	if($check_in< Carbon::today() || $check_out < Carbon::today()) {
    		return  back()->with('error','please select appropriate date');
    	}elseif ($check_in >= $check_out) {
    		return  back()->with('error','check date must be less than checkout date');
    	}

        $request_rooms = $request->rooms;
    	$rooms = array();

    	foreach ($request_rooms as $room_id) {
    		$room = $singleRoom->singleRoom($room_id);
            $rooms[$room_id] = $room;
    	}


    	$create_booking = $this->createBooking($rooms,$check_in,$check_out);
    	if ($create_booking) {

    		return  redirect()->route('Users.PendingOrders')->with('success','Yor Orders Are Added To Pending Orders');
    	}

    	return back()->with('error','Some Thing Went Wrong');

    }

    public function createBooking(array $rooms,$checkin,$checkout)
    {
        $this->checkin = $checkin;
        $this->checkout = $checkout;
        $this->date_difference = $checkin->diffInDays($checkout);

       if (isset($rooms)) {
       	foreach ($rooms as $key => $value) {
            $this->room = $value;

       		DB::transaction(function(){
       		   $user = Auth::user();
               Booking::create([
                  'user_id'         =>   $user->id,
                  'hotel_id'        =>   $this->room->room_hotel_id,
                  'room_id'         =>   $this->room->id,
                  'price'           =>   $this->room->room_price*$this->date_difference,
                  'check_in'        =>   $this->checkin,
                  'check_out'       =>   $this->checkout,
                  'status'   	    =>   false,
               ]);

    		},3);
       	}

       	return true;

    	}

    	return false;
    }


}
