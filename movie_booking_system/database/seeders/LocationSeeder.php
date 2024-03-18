<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('locations')->insert([
            'name'=>"Pavillion",
        ]);

        DB::table('locations')->insert([
            'name'=>"Sunway Pyramid",
        ]);

        DB::table('locations')->insert([
            'name'=>"Sunway Velocity",
        ]);

        DB::table('locations')->insert([
            'name'=>"Eco Cheras Mall",
        ]);

        DB::table('locations')->insert([
            'name'=>"KLCC Suria Mall",
        ]);
    }
}
