<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;
use Faker\Generator as Faker;
class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker)
    {
      for ($i=0; $i < 30; $i++) { 
        $new_project =  new Project;

        $new_project->title = $faker->catchPhrase();
        $new_project->description = $faker->paragraph();
        $new_project->link = $faker->imageUrl(640, 480, 'project', true);
        $new_project->save();
      }
    }
}