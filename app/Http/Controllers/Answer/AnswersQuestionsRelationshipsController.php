<?php

namespace App\Http\Controllers\Answer;

use App\Http\Controllers\Controller;
use App\Http\Requests\JSONAPIRelationshipRequest;
use App\Models\Answer;
use App\Services\JSONAPIService;

class AnswersQuestionsRelationshipsController extends Controller
{
	public function __construct(JSONAPIService $service)
	{
		$this->service = $service;
	}

	public function index(Answer $answer)
	{
		return $this->service->fetchRelationship($answer, 'quizzes');
	}

	public function update(JSONAPIRelationshipRequest $request, Answer $answer)
	{
		return $this->service->updateManyToManyRelationships($answer, 'questions', $request->input('data.*.id'));
	}
}
