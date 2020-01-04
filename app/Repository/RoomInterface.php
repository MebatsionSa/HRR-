<?php
namespace  App\Repository;

interface RoomInterface {

	public function AllRoom($hotel_id);
	public function singleRoom($room_id);
	public function deleteRoom($room_id);
	
}
?>