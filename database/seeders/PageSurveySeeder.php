<?php

namespace Database\Seeders;

use App\Models\PageSurvey;
use Faker\Factory;
use Illuminate\Database\Seeder;

class PageSurveySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        for ($i = 0, $ii = 10; $i < $ii; $i++) {
            PageSurvey::create([
                'name' => $faker->name(),
                'notes' => $faker->paragraph(),
            ]);
        }
    }
}
