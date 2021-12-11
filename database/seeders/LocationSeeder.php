<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('locations')->insert([
            [
                'location_name' => 'Çekmece 1'
            ],
            [
                'location_name' => 'Çekmece 2'
            ],
            [
                'location_name' => 'Çekmece 3'
            ],
            [
                'location_name' => 'Çekmece 4'
            ],
            [
                'location_name' => 'Çekmece 5'
            ]
        ]);
    }
}
