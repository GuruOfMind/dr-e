<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AnswerResource extends JsonResource
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
			'data' => [
				'id' => $this->id,
				'type' => 'answer',
				'attributes' => [
					'body' => $this->body,
					'is_correct' => $this->is_correct,
				],
				'relationships' => [
					'question' => [
						"data" => [
							new QuestionResource($this->question),
						]
					],
				],

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
