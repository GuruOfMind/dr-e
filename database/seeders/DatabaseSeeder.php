<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
		// $this->call(ExaminerSeeder::class);
		// $this->call(CategorySeeder::class);
		// $this->call(QuizSeeder::class);
		// $this->call(QuestionSeeder::class);
		$this->call(AnswerSeeder::class);
    }
}
