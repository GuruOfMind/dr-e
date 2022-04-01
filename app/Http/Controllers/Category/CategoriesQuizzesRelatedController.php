<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Services\JSONAPIService;

class CategoriesQuizzesRelatedController extends Controller
{
	/**
	 * @var JSONAPIService
	 */
	private $service;

	public function __construct(JSONAPIService $service)
	{
		$this->service = $service;
	}

	public function index(Category $category)
	{
		return $this->service->fetchRelated($category, 'quizzes');
	}
}
