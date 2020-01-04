<?php

namespace App\Http\Middleware\Hotels;

use Closure;

class HotelApprove
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {   
        $hotel = hotel_logged_in();
        if ($hotel->hotel_status) {
            
            return $next($request);
        }

        return redirect()->route('Hotels.HotelDashBoard');
        
    }
}
