<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rooms')->truncate();
        DB::table('rooms')->insert([
            [
                'name' => 'Royal Palm Heritage 1',
                'room_size' => '20 m2',
                'description' => 'Located in the famous neighborhood of Seoul, 
Grand Luxury’s is set in a building built in the 
2010s.',
                'price' => 200,
                'hotel_id' => 1,
            ],
            [
                'name' => 'Royal Palm Heritage 2',
                'room_size' => '35 m2',
                'description' => 'Located in the famous neighborhood of Seoul, 
Grand Luxury’s is set in a building built in the 
2010s.',
                'price' => 400,
                'hotel_id' => 1,
            ],
            [
                'name' => 'Royal Palm Heritage 3',
                'room_size' => '50 m2',
                'description' => 'Located in the famous neighborhood of Seoul, 
Grand Luxury’s is set in a building built in the 
2010s.',
                'price' => 1000,
                'hotel_id' => 1,
            ],
            [
                'name' => 'Grand Luxury’s 1',
                'room_size' => '20 m2',
                'description' => 'You will find every comfort because many of the 
services that the hotel offers for travellers and of 
course the hotel is very comfortable.',
                'price' => 300,
                'hotel_id' => 2,
            ],
            [
                'name' => 'Grand Luxury’s 2',
                'room_size' => '40 m2',
                'description' => 'You will find every comfort because many of the 
services that the hotel offers for travellers and of 
course the hotel is very comfortable.',
                'price' => 650,
                'hotel_id' => 2,
            ],
            [
                'name' => 'The Orlando House 1',
                'room_size' => '40 m2',
                'description' => 'You will find every comfort because many of the 
services that the hotel offers for travellers and of 
course the hotel is very comfortable.',
                'price' => 650,
                'hotel_id' => 3,
            ],
        ]);
    }
}
