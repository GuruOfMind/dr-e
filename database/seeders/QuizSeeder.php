<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Examiner;
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
		\App\Models\Quiz::factory(32)->make()->each(function ($quiz){
			$quiz->category()->associate(Category::inRandomOrder()->first());
			$quiz->examiner()->associate(Examiner::inRandomOrder()->first());
			$quiz->save();
		});
    }
}
