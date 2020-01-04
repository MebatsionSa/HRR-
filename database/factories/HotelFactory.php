<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Hotel;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;
$factory->define(Hotel::class, function (Faker $faker) {
    return [
        'hotel_name'          =>  $faker->name,
        'hotel_phone_number'  =>  $faker->unique()->e164PhoneNumber,
        'hotel_email'         =>  $faker->unique()->freeEmail,
        'hotel_type'          =>  '2 Star',
        'hotel_city'          =>  'Addis Ababa',
        'password'            =>  Hash::make('1234'),
        'hotel_status'        =>  true,
    ];
});
