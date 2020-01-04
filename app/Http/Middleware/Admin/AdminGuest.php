<?php

namespace App\Http\Middleware\Admin;
use Illuminate\Support\Facades\Auth;
use Closure;

class AdminGuest
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
        if(Auth::guard('admins')->check()){
          return back();
        }
        return $next($request);
    }
}
