<?php

use Illuminate\Database\Seeder;
use App\Hotel;
class HotelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Hotel::class,10)->create();
    }
}
