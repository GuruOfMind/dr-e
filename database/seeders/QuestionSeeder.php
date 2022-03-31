<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create('ar_SA');
		$quizID = DB::table('quizzes')->pluck('id');
		
		
		for ($i = 0; $i < 10; $i++) {
			Question::create([
				'body' => $faker->sentence,
				'quiz_id' => $faker->randomElement($quizID),
			]);
		}
    }
}
