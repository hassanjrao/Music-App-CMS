<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::updateOrCreate([
            'id' => 1,
        ], [
            'id' => 1,
            // working_days json column
            'working_days' => json_encode(['Monday', 'Tuesday', 'Wednesday', 'Thursday']),
            'start_time' => '09:00',
            'end_time' => '17:00',
        ]);
    }
}
