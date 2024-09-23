<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Event::create([
            'name' => 'Sunday Fundays',
            'description' => 'loreum ipsum dolor sit amet, consectetur adipiscing elit. Sed ut purus eget sapien egestas fermentum',
            'image' => 'event1.jpg',
            'date' => '2024-09-23',
            'time_start' => '14:00:00',
            'time_end' => '18:00:00',
            'venue' => 'The Grand Hall',
            'location' => 'New York, USA',
        ]);

        Event::create([
            'name' => 'Wedding Bells',
            'description' => 'loreum ipsum dolor sit amet, consectetur adipiscing elit. Sed ut purus eget sapien egestas fermentum',
            'image' => 'event2.jpg',
            'date' => '2024-09-23',

            'time_start' => '14:00:00',
            'time_end' => '18:00:00',
            'venue' => 'The Grand Hall',
            'location' => 'New York, USA',
        ]);

        Event::create([
            'name' => 'Corporate Events',
            'description' => 'loreum ipsum dolor sit amet, consectetur adipiscing elit. Sed ut purus eget sapien egestas fermentum',
            'image' => 'event3.jpg',
            'date' => '2024-09-23',
            'time_start' => '14:00:00',
            'time_end' => '18:00:00',
            'venue' => 'The Grand Hall',
            'location' => 'New York, USA',
        ]);
    }
}
