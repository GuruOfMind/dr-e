<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class AnswerCollection extends ResourceCollection
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
				'answers' => $this->collection->map(
					function ($data) {
						return [
							'id' => $data->id,
							'body' => $data->body,
							'is_correct' => $data->is_correct,
							'relationships' => [
								'question' => $data->question_id
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
