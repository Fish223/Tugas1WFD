<?php

namespace Database\Seeders;

use App\Models\EventCategory;
use Illuminate\Database\Seeder;

class EventCategorySeeder extends Seeder
{
    public function run()
    {
        EventCategory::create(['name' => 'Expo']);
        EventCategory::create(['name' => 'Concert']);
        EventCategory::create(['name' => 'Conference']);
        EventCategory::create(['name' => 'Workshop']);
        EventCategory::create(['name' => 'Webinar']);
    }
}
