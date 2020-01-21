<?php


//A Controller for the Hotel login part

namespace App\Http\Controllers\Hotels;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HotelLogInController extends Controller
{
     public function showLogInPage()
     {
     	return view('hotels.login');
     }

     public function logIn(Request $request)
     {
        $credentials = $request->only(['hotel_email','hotel_password']);
        if (Auth::guard('hotels')->attempt([
        	'hotel_email'=>$credentials['hotel_email'],
        	'password'=>$credentials['hotel_password'],
          ])) {

        	return redirect()->route('Hotels.HotelDashBoard');

        }else{
        	return back()->with('login_error','');
        }

     }


}
