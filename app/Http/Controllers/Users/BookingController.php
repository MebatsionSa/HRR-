<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repository\BookingInterface;
class BookingController extends Controller
{
     public function index(){

     }

     public function booking(BookingInterface $booking)
     {
        $user = user_logged_in();
        $pending_orders = $booking->allPendingOrderForuser($user->id);
        return view('users.pendingorders',['pending_orders'=>$pending_orders]);
     }
}
