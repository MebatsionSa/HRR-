<?php

namespace App;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Authenticatable
{  
	
    protected $table = 'hotels';
    protected $guarded = [];

    protected $hidden =['hotel_password'];

    public  function profilePicture()
    {
    	
    }
}
