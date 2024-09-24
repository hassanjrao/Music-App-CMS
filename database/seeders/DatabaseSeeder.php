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


        $this->call([
            // RoleSeeder::class,
            // UserSeeder::class,
            // AlbumSeeder::class,
            // GenreSeeder::class,
            // TagSeeder::class,
            // DjSeeder::class,
            // EventPlanningEssentialSeeder::class,
            // ServiceSeeder::class,
            // StaffSeeder::class,
            // EventSeeder::class,
        ]);
    }
}
