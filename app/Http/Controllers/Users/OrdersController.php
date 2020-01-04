<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Repository\BookingInterface;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function pendingOrders()
    {

    }

    public function paidedOrders(BookingInterface $booking)
    {
        $user = user_logged_in();
        $paided_orders = $booking->allPaidedOrdersForUsers($user->id);
        return view('users.paidedOrders',['paided_orders'=>$paided_orders]);
    }
}
