<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Reques;
use App\Extension\PaymentGateWay;
use App\Booking;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
     public function index(PaymentGateWay $paymentGateWay,$id)
     {
         if ($id != 'total'){
             $check = $this->checkExisenceOfId($id);
             if (!$check)
             {
                 return back()->with('error','invalid Id');
             }
         }
         $paymentGateWay->setId($id);
         return view('users.paymentmethods');
     }

     public function checkExisenceOfId($id)
     {
         $booking = Booking::findOrFail($id);
         if ($booking->hasUserId(Auth::id()) && $booking->hasStatus(false))
         {
             return true;
         }

         return false;
     }
}
