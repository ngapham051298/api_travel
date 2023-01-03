<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('books')->truncate();
        DB::table('books')->insert([
            [
                'customer_id' => 4,
                'room_id' => 1,
                'book_start_date' => '2023-01-03',
                'book_end_date' => '2023-01-04',
                'user_id' => 3,
            ],
            [
                'customer_id' => 9,
                'room_id' => 2,
                'book_start_date' => '2023-01-03',
                'book_end_date' => '2023-01-04',
                'user_id' => 7,
            ],
            [
                'customer_id' => 8,
                'room_id' => 3,
                'book_start_date' => '2023-01-03',
                'book_end_date' => '2023-01-04',
                'user_id' => 3,
            ],
        ]);
    }
}
