<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Tag::create([
            "tag"=>"pop"
        ]);
        Tag::create([
            "tag"=>"disco"
        ]);
        Tag::create([
            "tag"=>"classic"
        ]);
        Tag::create([
            "tag"=>"antique"
        ]); 
        
    }
}
