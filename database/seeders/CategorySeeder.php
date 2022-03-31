<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{

		$faker = \Faker\Factory::create('ar_SA');
		
		for ($i = 0; $i < 10; $i++) {
			Category::create([
				'name' => $faker->unique()->colorName
			]);
		}
	}
}
