<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {

        for ($i = 0; $i < 20; $i++) {
            $newProject = new Project();

            $newProject->name = $faker->sentence(3);
            $newProject->client = $faker->company();
            $newProject->period = $faker->date();
            $newProject->description = $faker->paragraph();
            //$newProject->type = $faker->sentence(3);

            $newProject->save();
        }
    }
}
