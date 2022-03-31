<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class QuestionResource extends JsonResource
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
				'question' =>  [
					'id' => $this->id,
					'body' => $this->body,
					'relationships' => [
						new QuizResource($this->quiz),
					],
				]
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
