<?php

namespace Database\Seeders;

use App\Models\AppointmentFocus;
use Illuminate\Database\Seeder;

class AppointmentFocusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AppointmentFocus::create([
            'title'=>'Weddings',
            'subtitle'=>'Wedding Planning',
        ]);

        AppointmentFocus::create([
            'title'=>'Corporate Events',
            'subtitle'=>'Corporate Event Planning',
        ]);

        AppointmentFocus::create([
            'title'=>'Photobooth Rentals',
            'subtitle'=>'Photobooth Rental Services',
        ]);
    }
}
