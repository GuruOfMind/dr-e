<?php

namespace App\Http\Resources;

use App\Models\Examiner;
use Illuminate\Http\Resources\Json\ResourceCollection;

class QuizCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
			'data' => [
				'quizzes' => $this->collection->map(
					function ($data) {
						return [
							'id' => $data->id,
							'name' => $data->name,
							'slug' => $data->slug,
							'year' => $data->year,
							'semester' => $data->semester,
							'relationships' => [
								new ExaminerResource($data->examiner),
								new CategoryResource($data->category),
							],
						];
					}
				)
			]
		];
	}

	public function with($request)
	{
		return [
			'error' => [],
			'isSuccess' => true
		];
	}
}
