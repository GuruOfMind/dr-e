<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ExaminerResource extends JsonResource
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
			'examiner' => [
				'id' => $this->id,
				'name' => $this->name
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
