<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;
use Faker\Factory as Faker;

class EventSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            Event::create([
                'title' => $faker->sentence,
                'date' => $faker->date,
                'location' => $faker->city,
                'description' => $faker->paragraph,
            ]);
        }
    }
}

