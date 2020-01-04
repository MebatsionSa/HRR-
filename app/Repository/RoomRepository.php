<?php
namespace  App\Repository;
use App\Room;
class RoomRepository  implements RoomInterface
{
	
	public function AllRoom($hotel_id){
        
      return Room::where('room_hotel_id',$hotel_id)->get();

	}

	
	public function singleRoom($room_id)
	{
		return Room::findOrFail($room_id);
	}
	public function deleteRoom($room_id)
	{
		return Room::findOrFail($room_id)->delete();
	}
}
?>