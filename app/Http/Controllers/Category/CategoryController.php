<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\JSONAPIRequest;
use App\Models\Category;
use App\Services\JSONAPIService;

class CategoryController extends Controller
{
	private $service;
	
	public function __construct(JSONAPIService $service)
	{
		$this->service = $service;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		return $this->service->fetchResources(Category::class, 'categories');
		
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \App\Http\Requests\StoreCategoryRequest  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(JSONAPIRequest $request)
	{
		return $this->service->createResource(Category::class, $request->input('data.attributes'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Models\Category  $category
	 * @return \Illuminate\Http\Response
	 */
	public function show($category)
	{
		return $this->service->fetchResource(Category::class, $category, 'categories');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \App\Http\Requests\UpdateCategoryRequest  $request
	 * @param  \App\Models\Category  $category
	 * @return \Illuminate\Http\Response
	 */
	public function update(JSONAPIRequest $request, Category $category)
	{
		return $this->service->updateResource($category, $request->input('data.attributes'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\Category  $category
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Category $category)
	{
		return $this->service->deleteResource($category);
	}
}
