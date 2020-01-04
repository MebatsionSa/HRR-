<?php

namespace App\Http\Controllers\Hotels;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Room as RoomRequest;
use App\Room;
use App\ProfilePicture;
use DB;
class HotelRoomController extends Controller
{   
	private $hotel;
	private $validated_data;
    private $image_path;

	public function __construct()
	{
       

	}

    public function showAddRoomPage()
    {
    	return view('hotels.room.add');
    }

    public function addRoom(RoomRequest $request)
    {
       $this->validated_data = $request->validated();
       $this->image_path = Storage::disk('public')->putFile('room',$this->validated_data['room_image'],'public');
       $this->hotel = hotel_logged_in();
       $create = $this->addRoomToDatabase();

       if ($create) {
       	 return back()->with('success','Room Added successFully We Will Approve Soon');
       }

       return back()->with('error','Some Thing Went Wrong We Didnt Add Your Room Please Try Again');
      
       
       

    }

    public function addRoomToDatabase()
    {
   
     $create =  DB::transaction(function(){ 

	        $room =   Room::create([
	              
	              'room_name'          		=> 	$this->validated_data['room_name'],
	              'room_price'         		=> 	$this->validated_data['room_price'],
	              'room_description' 		=> 	$this->validated_data['description'],
	              'room_hotel_id' 			=> 	$this->hotel->id,
	              'amount'        			=> 	$this->validated_data['room_number']
	           ]);

	        $profile =  ProfilePicture::create([

	             'type'       =>  'Room',
	             'type_id'    =>  $room->id,
	             'image_path' =>  $this->image_path,

	           ]);

       },3);

      
      	return true;
      
    }
}
