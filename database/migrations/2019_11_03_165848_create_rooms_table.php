<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('room_name');
            $table->longText('room_description');
            $table->unsignedBigInteger('room_hotel_id');
            $table->integer('amount');
            $table->boolean('room_status')->default(false);
            $table->float('room_price',6,2);
            $table->foreign('room_hotel_id')->references('id')->on('hotels')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rooms');
    }
}
