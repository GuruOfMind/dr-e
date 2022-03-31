<?php

namespace Database\Seeders;

use App\Models\Quiz;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuizSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		
		$faker = \Faker\Factory::create('ar_EG');
		$examinerID = DB::table('examiners')->pluck('id');
		$categoryID = DB::table('categories')->pluck('id');
		
		for ($i = 0; $i < 10; $i++) {
			Quiz::create([
				'name' => $faker->unique()->company,
				'year' => $faker->year,
				'semester' => $faker->numberBetween(1, 3),
				'category_id' => $faker->randomElement($categoryID),
				'examiner_id' => $faker->randomElement($examinerID),
			]);
		}
    }
}
