<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class QuestionCollection extends ResourceCollection
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
				'questions' => $this->collection->map(
					function ($data) {
						return [
							'id' => $data->id,
							'body' => $data->body,
							'relationships' => [
								'quiz_id' => $data->quiz_id,
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