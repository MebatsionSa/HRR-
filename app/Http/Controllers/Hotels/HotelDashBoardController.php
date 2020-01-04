<?php

namespace App\Http\Controllers\Hotels;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class HotelDashBoardController extends Controller
{
	private $hotel;

	public function __construct()
	{
        $this->hotel = hotel_logged_in();
	}

    public function hotelDashBoard()
    {
       	return view('hotels.hoteldashboard');
    }

    public function logOut()
    {
       Auth::guard('hotels')->logOut();
       return redirect()->route('Hotels.LogInPage')->with('logout_message','');
    }
}
