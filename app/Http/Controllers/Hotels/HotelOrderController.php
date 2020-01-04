<?php

namespace App\Http\Controllers\Hotels;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repository\BookingInterface;

class HotelOrderController extends Controller
{
     public function allOrders(BookingInterface $booking)
     {
        $all_orders = $booking->allPaidedOrdersForHotels();
        return view('hotels.orders.allorders',['all_orders'=>$all_orders]);
     }

     public  function todayCheckIn(BookingInterface $booking){
         $today_checkin = $booking->todayCheckIn();
         return view('hotels.orders.todaycheckin',['today_checkin'=>$today_checkin]);
     }

     public function searchToDayorder(BookingInterface $booking ,Request $request){
         $request->validate([
             'order_id' => 'required',
         ]);
         $today_checkin = $booking->searchOrder($request->order_id);
         return view('hotels.orders.todaycheckin',['today_checkin' => $today_checkin]);
     }

     public function givingRoom($order_id)
     {
         return view('hotels.orders.givingroom',['order_id' => $order_id]);
     }

     public function handlegivingRoom(){

     }
}
