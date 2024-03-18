<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('times')->insert([
            'time'=>"11.00 a.m.",
        ]);

        DB::table('times')->insert([
            'time'=>"12.00 p.m.",
        ]);

        DB::table('times')->insert([
            'time'=>"2.00 p.m.",
        ]);

        DB::table('times')->insert([
            'time'=>"4.00 p.m.",
        ]);

        DB::table('times')->insert([
            'time'=>"10.00 p.m.",
        ]);
    }
}
