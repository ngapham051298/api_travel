<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reviews')->truncate();
        DB::table('reviews')->insert([
            [
                'customer_id' => 4,
                'hotel_id' => 1,
                'room_id' => 1,
                'review_date' => '2023-01-04',
            ],
            [
                'customer_id' => 9,
                'hotel_id' => 1,
                'room_id' => 2,
                'review_date' => '2023-01-04',
            ],
            [
                'customer_id' => 8,
                'hotel_id' => 1,
                'room_id' => 3,
                'review_date' => '2023-01-04',
            ],
        ]);
    }
}
