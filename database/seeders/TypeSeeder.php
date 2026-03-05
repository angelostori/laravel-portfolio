<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $names = ["Beck End", "FrontEnd", "Web Design"];

        foreach ($names as $name) {
            $newType = new Type();

            $newType->name = $name;

            $newType->save();
        }
    }
}
