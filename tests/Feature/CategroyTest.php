<?php

namespace Tests\Feature;

use App\Http\Resources\CategoryResource;
use App\Http\Resources\JSONAPIResource;
use App\Models\Category;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;

use Tests\TestCase;

class CategoryTest extends TestCase
{
	use DatabaseMigrations;

	/**
	 * @test
	 */
	public function it_returns_a_category_as_a_resource_object()
	{
		$category = Category::create([
			'name' => 'a',
		]);
		return new JSONAPIResource($category);

		$this->getJson('/api/categories/1')->assertStatus(200)->assertJson(
				[
					"data" => [
						"id" => "1",
						"type" => "categories",
						"attributes" => [
							"name" => "a"
						]
					]
				]
			);
	}
}
