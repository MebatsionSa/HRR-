<?php

namespace App\Http\Middleware\Hotels;

use App\Booking;
use Closure;
use Illuminate\Support\Facades\Auth;

class Comment
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$id)
    {
        $exists = Booking::where('hotel_id',$id)->where('user_id',Auth::user()->id)->exists();
        if ($exists){
            return $next($request);
        }
        return back();
    }
}
