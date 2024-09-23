<?php

namespace Database\Seeders;

use App\Models\Staff;
use Illuminate\Database\Seeder;

class StaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Staff::create([
            'name' => 'John Doe',
            'designation' => 'Photographer',
            'image' => 'staff1.jpg',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ut purus eget sapien egestas fermentum'
        ]);


        Staff::create([
            'name' => 'Lara Croft',
            'designation' => 'Event Manager',
            'image' => 'staff1.jpg',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ut purus eget sapien egestas fermentum'
        ]);


        Staff::create([
            'name' => 'Keanu Reeves',
            'designation' => 'Creative Director',
            'image' => 'staff1.jpg',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ut purus eget sapien egestas fermentum'
        ]);
    }
}
