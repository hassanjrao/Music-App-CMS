<?php

namespace Database\Seeders;

use App\Models\Album;
use Illuminate\Database\Seeder;

class AlbumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Album::Create([
            "name" => "Sana"
        ]);
        Album::Create([
            "name" => "Hassan"
        ]);
        Album::Create([
            "name" => "Momim"
        ]);
        Album::Create([
            "name" => "Aima"
        ]);
        Album::Create([
            "name" => "Laraib"
        ]);
       
    }
}
