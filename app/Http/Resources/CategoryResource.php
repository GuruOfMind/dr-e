<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
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
			'type' => 'categories',
			'attributes' => [
				'name' => $this->name,
				'slug' => $this->slug
			],

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
