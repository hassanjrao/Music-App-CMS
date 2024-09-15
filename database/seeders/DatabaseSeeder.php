<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\Tag::factory(10)->create();

        $this->call(UserSeeder::class);
        $this->call(AlbumSeeder::class);
        $this->call(GenreSeeder::class);
        $this->call(TagSeeder::class);
          $this->call(DjSeeder::class);

    }
}
