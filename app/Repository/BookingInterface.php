<?php

namespace App\Repository;

interface BookingInterface {

	public function singlePendingOrder($id);
	public function allPendingOrderForuser($user_id);
	public function allPendingOrderForHotels($hotel_id);
	public function singlePaidedOrder($id);
	public function allPaidedOrdersForUsers($user_id);
	public function allPaidedOrdersForHotels();
	public function todayCheckIn();
    public function searchOrder($order_id);



}

?>
