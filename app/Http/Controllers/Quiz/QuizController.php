<?php

namespace App\Http\Controllers\Quiz;

use App\Http\Controllers\Controller;
use App\Http\Requests\JSONAPIRequest;
use App\Models\Quiz;
use App\Services\JSONAPIService;

class QuizController extends Controller
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
		return $this->service->fetchResources(Quiz::class, 'quizzes');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \App\Http\Requests\StoreAnswerRequest  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(JSONAPIRequest $request)
	{
		return $this->service->createResource(Quiz::class, $request->input('data.attributes'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Models\Answer  $quiz
	 * @return \Illuminate\Http\Response
	 */
	public function show(Quiz $quiz)
	{
		return $this->service->fetchResource(Quiz::class, $quiz, 'quizzes');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \App\Http\Requests\UpdateAnswerRequest  $request
	 * @param  \App\Models\Answer  $quiz
	 * @return \Illuminate\Http\Response
	 */
	public function update(JSONAPIRequest $request, Quiz $quiz)
	{
		return $this->service->updateResource($quiz, $request->input('data.attributes'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\Answer  $quiz
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Quiz $quiz)
	{
		return $this->service->deleteResource($quiz);
	}
}
