<?php
//to merge and pull
namespace App\Http\Controllers\Hotels;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\HotelRegistration;

use App\Hotel;
class HotelRegistrationController extends Controller
{
    public function showRegistrationForm()
    {
    	return view('hotels.registration');
    }
    /*hotel registration
     *
     * */
    public function register(HotelRegistration $request)
    {
       $validated_data = $request->validated();
       $registration = Hotel::create([

            'h  otel_name'         =>  $validated_data['hotel_name'],
            'hotel_phone_number' =>  $validated_data['hotel_phone_number'],
            'hotel_email'        =>  $validated_data['hotel_email'],
            'hotel_city'         =>  $validated_data['hotel_city'],
            'password'           =>  Hash::make($validated_data['hotel_password']),
            'hotel_type'         =>  $validated_data['hotel_type'],
       ]);

       if ($registration) {
       	   Auth::guard('hotels')->login($registration);
       	   return redirect()->route('Hotels.HotelDashBoard')->with('hotel_registration','hotel registered successfully');

       }else{

          return back()->with('registration_error','something went wrong please try again');
       }

    }


}
