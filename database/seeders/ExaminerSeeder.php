<?php

namespace Database\Seeders;

use App\Models\Examiner;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExaminerSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$faker = \Faker\Factory::create('ar_EG');

		for ($i = 0; $i < 10; $i++) {
			Examiner::create([
				'name' => $faker->unique()->name
			]);
		}
	}
}
