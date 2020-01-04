<?php
namespace  App\Extension;

class Rooms 
{
	
	public function totalPriceOfPendingOrderForUser($pendingOrders)
	{
       $sum = 0;
       foreach($pendingOrders as $order)
       {
       	 $sum = $sum+$order->price;
       }

       return $sum;
	}
}
?>