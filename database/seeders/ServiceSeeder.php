<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Service::create([
            'name'=>'Weddings',
            'description'=>'We provide the best wedding services',
            'image'=>'wedding.jpg',
        ]);

        Service::create([
            'name'=>'Corporate Events',
            'description'=>'We provide the best corporate event services',
            'image'=>'wedding.jpg',
        ]);


        Service::create([
            'name'=>'Photobooth Rentals',
            'description'=>'We provide the best photobooth rental services',
            'image'=>'wedding.jpg',
        ]);

        Service::create([
            'name'=>'Other Events',
            'description'=>'We provide the best other event services',
            'image'=>'wedding.jpg',
        ]);
    }
}
