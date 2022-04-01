<?php

namespace App\Http\Controllers\Quiz;

use App\Http\Controllers\Controller;
use App\Models\Quiz;
use App\Services\JSONAPIService;
use Illuminate\Http\Request;

class QuizzesExaminersRelatedController extends Controller
{
	/**
	 * @var JSONAPIService
	 */
	private $service;

	public function __construct(JSONAPIService $service)
	{
		$this->service = $service;
	}

	public function index(Quiz $quiz)
	{
		return $this->service->fetchRelated($quiz, 'examiners');
	}
}
