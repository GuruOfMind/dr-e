<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class QuizResource extends JsonResource
{
	/**
	 * Transform the resource into an array.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
	 */
	public function toArray($request)
	{
		return [
			'id' => $this->id,
			'type' => 'quizzes',
			'atttributes' => [
				'name' => $this->name,
				'slug' => $this->slug,
				'year' => $this->year,
				'semester' => $this->semester,
			],
			'relationships' => [
				new ExaminerResource($this->examiner),
				new CategoryResource($this->category),
			],
		];
	}
}
