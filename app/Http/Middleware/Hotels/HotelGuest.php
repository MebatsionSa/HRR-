<?php

namespace App\Http\Middleware\Hotels;
use Illuminate\Support\Facades\Auth;
use Closure;

class HotelGuest
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
        if (Auth::guard('hotels')->check()) {
            
            return redirect()->route('Hotels.HotelDashBoard');
        }
        return $next($request);
    }
}
