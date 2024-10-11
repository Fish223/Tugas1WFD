<?php

namespace Database\Seeders;

use App\Models\Organizer;
use Illuminate\Database\Seeder;

class OrganizerSeeder extends Seeder
{
    public function run()
    {
        for ($i = 1; $i <= 5; $i++) {
            Organizer::create([
                'name' => "Organizer $i",
                'description' => "Description for Organizer $i",
                'facebook_link' => "https://facebook.com/organizer$i",
                'x_link' => "https://x.com/organizer$i",
                'website_link' => "https://organizer$i.com",
                'active' => 1,
            ]);
        }
    }
}
