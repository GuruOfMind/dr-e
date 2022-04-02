<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Answer>
 */
class AnswerFactory extends Factory
{
	/**
	 * Define the model's default state.
	 *
	 * @return array<string, mixed>
	 */
	public function definition()
	{
		return [
			'body' => $this->faker->sentence($nbWords = 4),
			'is_correct' => false
		];
	}

	public function correct()
	{
		return $this->state(function (array $attributes) {
			return [
				'is_correct' => true,
			];
		});
	}
}
