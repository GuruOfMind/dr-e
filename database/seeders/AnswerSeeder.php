<?php

namespace Database\Seeders;

use App\Models\Answer;
use App\Models\Question;
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
		Question::all()->each(function(Question $question){
			$question->answers()->saveMany(Answer::factory(3)->create(['question_id'=>$question->id]));
			$question->answers()->saveMany(Answer::factory(1)->correct()->create(['question_id'=>$question->id]));
		});
    }
}
