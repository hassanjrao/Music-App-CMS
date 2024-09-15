<?php

namespace Database\Seeders;

use App\Models\DJ;
use Illuminate\Database\Seeder;

class DjSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DJ::create([
            "name"=>"DJ Hassan",
            "about"=>"DJ Hassan is a professional DJ with 10 years of experience in the music industry. He has performed at various events and parties, and is known for his energetic and engaging performances. DJ Hassan is passionate about music and loves to create a fun and memorable experience for his audience."
        ]);
    }
}
