<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Genre::Create([
            "genre" => "House"
        ]);
        Genre::Create([
            "genre" => "EDM / Dance"
        ]);
        Genre::Create([
            "genre" => "Hip-Hop / Rap"
        ]);
        Genre::Create([
            "genre" => "R&B"
        ]);
        Genre::Create([
            "genre" => "Disco"
        ]);
        Genre::Create([
            "genre" => "Country"
        ]);

        Genre::Create([
            "genre" => "Rock"
        ]);
        Genre::Create([
            "genre" => "Reggae"
        ]);

        Genre::Create([
            "genre" => "Reggaeton"
        ]);

        Genre::Create([
            "genre" => "Latin"
        ]);
        Genre::Create([
            "genre" => "Punjabi"
        ]);
        Genre::Create([
            "genre" => "Freestyle"
        ]);
    }
}
