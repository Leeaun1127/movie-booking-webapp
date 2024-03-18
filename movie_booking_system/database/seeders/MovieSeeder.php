<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('movies')->insert([
            'name'=>"Air Force",
            'poster'=>"assets/movie_img0.jpg",
            'genre'=>"cincai",
            'duration'=>"1 hr 30 mins",
            'language'=>"en",
            'desc'=>"shushushu",
            'nowShowing'=>true,
        ]);
        DB::table('movies')->insert([
            'name'=>"Setan",
            'poster'=>"assets/movie_img1.jpg",
            'genre'=>"cincai",
            'duration'=>"2 hr 30 mins",
            'language'=>"en",
            'desc'=>"shushushu",
            'nowShowing'=>true,
        ]);

        DB::table('movies')->insert([
            'name'=>"Beast",
            'poster'=>"assets/movie_img2.jpg",
            'genre'=>"cincai",
            'duration'=>"1 hr 45 mins",
            'language'=>"en",
            'desc'=>"shushushu",
            'nowShowing'=>true,
        ]);

        DB::table('movies')->insert([
            'name'=>"Emergency Declaration",
            'poster'=>"assets/movie_img3.jpg",
            'genre'=>"cincai",
            'duration'=>"2 hr 0 mins",
            'language'=>"kn",
            'desc'=>"shushushu",
            'nowShowing'=>true,
        ]);

        DB::table('movies')->insert([
            'name'=>"Bullet Train",
            'poster'=>"assets/movie_img4.jpg",
            'genre'=>"cincai",
            'duration'=>"1 hr 50 mins",
            'language'=>"en",
            'desc'=>"shushushu",
            'nowShowing'=>true,
        ]);

        DB::table('movies')->insert([
            'name'=>"League of Superpets",
            'poster'=>"assets/movie_img5.jpg",
            'genre'=>"cincai",
            'duration'=>"1 hr 30 mins",
            'language'=>"en",
            'desc'=>"shushushu",
            'nowShowing'=>true,
        ]);

        DB::table('movies')->insert([
            'name'=>"Avatar 2",
            'poster'=>"assets/movie_img6.jpg",
            'genre'=>"cincai",
            'duration'=>"3 hr 30 mins",
            'language'=>"en",
            'desc'=>"shushushu",
            'nowShowing'=>true,
        ]);

        DB::table('movies')->insert([
            'name'=>"Black Panther 2",
            'poster'=>"assets/movie_img7.jpg",
            'genre'=>"cincai",
            'duration'=>"2 hr 15 mins",
            'language'=>"en",
            'desc'=>"shushushu",
            'nowShowing'=>true,
        ]);

        DB::table('movies')->insert([
            'name'=>"Halloween Ends",
            'poster'=>"assets/movie_img8.jpg",
            'genre'=>"horror",
            'duration'=>"2 hr 0 mins",
            'language'=>"en",
            'desc'=>"shushushu",
            'nowShowing'=>true,
        ]);

        DB::table('movies')->insert([
            'name'=>"The Invitation",
            'poster'=>"assets/movie_img9.jpg",
            'genre'=>"horror",
            'duration'=>"1 hr 45 mins",
            'language'=>"en",
            'desc'=>"shushushu",
            'nowShowing'=>true,
        ]);
    }
}
