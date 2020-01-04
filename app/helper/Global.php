<?php

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

if (!function_exists('hotel_logged_in')) {
	function hotel_logged_in(){

       if (Auth::guard('hotels')->check()) {

       	   $user = Auth::guard('hotels')->user();
       	   return $user;
        }

	}
}

if (!function_exists('user_logged_in')) {
	function  user_logged_in(){
		if (Auth::check()) {
			return Auth::user();
		}
	}
}

if (!function_exists('check_status_ofusers')){
    function check_status_ofusers($date)
    {
        $today = Carbon::today();
        if ($date > $today)
        {
           return  'Active';
        }

        return 'Used';
    }
}
