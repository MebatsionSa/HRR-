<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHotelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotels', function (Blueprint $table) {
            
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('hotel_name');
            $table->string('hotel_phone_number');
            $table->string('hotel_email')->unique();
            $table->string('hotel_type');
            $table->string('hotel_city');
            $table->string('password');
            $table->boolean('hotel_status')->default(false);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hotels');
    }
}
