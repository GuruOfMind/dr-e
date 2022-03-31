<?php

namespace Database\Seeders;

use App\Models\Answer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create('ar_SA');
		$questionID = DB::table('questions')->pluck('id');
		
		foreach ($questionID as $question_id) {
		
			for ($i = 0; $i < 3; $i++) {
				Answer::create([
					'body' => $faker->sentence($nbWords = 4),
					'is_correct' => false,
					'question_id' => $question_id,
				]);
			}
			Answer::create([
				'body' => $faker->sentence($nbWords = 4),
				'is_correct' => true,
				'question_id' => $question_id,
			]);
		}
    }
}
