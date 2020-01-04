<?php

namespace  App\Extension;
use App\Hotel;
use App\ProfilePicture;

class Common {

   public function AllAvailableHotels()
   {
       $all_available = Hotel::where('hotel_status',true)->paginate(10);
       return $all_available;
   }

   public function profilePicture($type,$id)
   {  
   	  $path = null;
      if ($type == 'Room') {
      	$path = 'storage/'.$this->fetchPicture($type,$id)->image_path;
      }elseif ($type == 'Hotel') {
      	 
        $image_path =  $this->fetchPicture($type,$id);
        if (isset($image_path)) {
        	$path = $image_path->image_path;
        }else{
           $path = HOTEL_IMAGE;
        }
      }elseif ($type == 'Room') {
        
        
      }elseif ($type == 'User') {
      	
      }

     return $path;
   }

   public function fetchPicture($type,$id)
   {
      $image_path = ProfilePicture::where('type',$type)->where('type_id',$id)->where('status',true)->first();
      return $image_path;
   }

}