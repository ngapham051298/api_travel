<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HotelSeeder extends Seeder
{
    public function run()
    {
        DB::table('hotels')->truncate();
        DB::table('hotels')->insert([
            [
                'name' => 'Royal Palm Heritage',
                'address' => 'Purwokerto, Jateng',
                'description' => ' 364 m from destination',
            ],
            [
                'name' => 'Grand Luxury’s',
                'address' => 'Banyumas, Jateng ',
                'description' => '2.3 km from destination',
            ],
            [
                'name' => 'The Orlando House',
                'address' => 'Ajibarang, Jateng ',
                'description' => '1.1 km from destination',
            ],
        ]);
    }
}
