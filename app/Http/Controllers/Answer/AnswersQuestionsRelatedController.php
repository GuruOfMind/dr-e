<?php

namespace App\Http\Controllers\Answer;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Services\JSONAPIService;

class AnswersQuestionsRelatedController extends Controller
{
    	/**
	 * @var JSONAPIService
	 */
	private $service;

	public function __construct(JSONAPIService $service)
	{
		$this->service = $service;
	}

	public function index(Answer $answer)
	{
		return $this->service->fetchRelated($answer, 'questions');
	}
}
