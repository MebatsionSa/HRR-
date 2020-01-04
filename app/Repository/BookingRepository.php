<?php
namespace App\Repository;
use App\Booking;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
/**
 *
 */
class BookingRepository implements BookingInterface
{

	public function singlePendingOrder($id)
	{
		return Booking::findOrFail($id);
	}
	public function allPendingOrderForuser($user_id){
		return Booking::with(['hotelInfo','roomInfo'])->where('user_id',Auth::user()->id)->where('status',false)->paginate(10);
	}
	public function allPendingOrderForHotels($hotel_id){

	}
	public function singlePaidedOrder($id)
	{

	}
	public function allPaidedOrdersForUsers($user_id)
	{
        return Booking::with(['hotelInfo','roomInfo'])->where('user_id',$user_id)->where('status',true)->orderBy('created_at')->paginate(10);
	}
	public function allPaidedOrdersForHotels()
	{
       return Booking::with(['roomInfo','userInfo'])->where('status',true)->where('hotel_id',Auth::guard('hotels')->user()->id)->paginate(10);
	}

	public function todayCheckIn()
    {
        return Booking::with(['roomInfo','userInfo'])->where('status',true)->where('hotel_id',Auth::guard('hotels')->user()->id)->whereDate('check_in',Carbon::today())->paginate(10);
    }

    public function searchOrder($order_id){
	    return Booking::with(['roomInfo','hotelInfo'])->where([

            ['id',$order_id],

        ])->whereDate('created_at',Carbon::today())->paginate(10);
    }


}
