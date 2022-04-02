<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Examiner;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Quiz>
 */
class QuizFactory extends Factory
{
	/**
	 * Define the model's default state.
	 *
	 * @return array<string, mixed>
	 */
	public function definition()
	{
		return [
			'name' => $this->faker->unique()->company,
			'year' => $this->faker->year,
			'semester' => $this->faker->numberBetween(1, 3)
		];
	}
}
