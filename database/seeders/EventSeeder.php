<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\EventCategory;
use App\Models\Organizer;
use App\Models\Event;
use Illuminate\Database\Seeder;

use Database\Seeders\EventCategorySeeder;
use Database\Seeders\OrganizerSeeder;

class EventSeeder extends Seeder
{
    public function run()
    {
        // Seed Event Categories
        $this->call(EventCategorySeeder::class);
        
        // Seed Organizers
        $this->call(OrganizerSeeder::class);

        // Seed Events with faker
        $faker = \Faker\Factory::create();
        for ($i = 1; $i <= 6; $i++) {
            Event::create([
                'title' => "Event $i",
                'venue' => "Venue $i",
                'date' => now()->addDays($i),
                'start_time' => now()->addHours($i),
                'description' => $faker->text,
                'booking_url' => null,
                'tags' => 'tag1, tag2',
                'organizer_id' => rand(1, 5),
                'event_category_id' => rand(1, 3),
                'active' => 1,
            ]);
        }
    }
}


