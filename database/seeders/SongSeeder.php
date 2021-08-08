<?php

namespace Database\Seeders;

use App\Models\Song;
use Illuminate\Database\Seeder;

class SongSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Song::create([
            "album_id"=> 1,
            "title"=>"tere bin",
            "genre_id"=> 1,
            "description"=>"dummy description of the song",
            "dj_name"=>"hassan",
            "streaming_url"=>"abcd.com",
            "explicit_layrics"=>1,
            "private"=>1,
        ]);

        Song::create([
            "album_id"=> 1,
            "title"=>"tere bin",
            "genre_id"=> 1,
            "description"=>"dummy description of the song",
            "dj_name"=>"hassan",
            "streaming_url"=>"abcd.com",
            "explicit_layrics"=>1,
            "private"=>1,
        ]);

        Song::create([
            "album_id"=> 1,
            "title"=>"tere bin",
            "genre_id"=> 1,
            "description"=>"dummy description of the song",
            "dj_name"=>"hassan",
            "streaming_url"=>"abcd.com",
            "explicit_layrics"=>1,
            "private"=>1,
        ]);
    }
}
