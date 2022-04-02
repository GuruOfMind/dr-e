<?php

namespace App\Http\Controllers\Question;

use App\Http\Controllers\Controller;
use App\Http\Requests\JSONAPIRequest;
use App\Models\Question;
use App\Services\JSONAPIService;

class QuestionController extends Controller
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
		return $this->service->fetchResources(Question::class, 'questions');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \App\Http\Requests\StoreAnswerRequest  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(JSONAPIRequest $request)
	{
		return $this->service->createResource(Question::class, $request->input('data.attributes'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Models\Answer  $question
	 * @return \Illuminate\Http\Response
	 */
	public function show(Question $question)
	{
		return $this->service->fetchResource(Question::class, $question, 'questions');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \App\Http\Requests\UpdateAnswerRequest  $request
	 * @param  \App\Models\Answer  $question
	 * @return \Illuminate\Http\Response
	 */
	public function update(JSONAPIRequest $request, Question $question)
	{
		return $this->service->updateResource($question, $request->input('data.attributes'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\Answer  $question
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Question $question)
	{
		return $this->service->deleteResource($question);
	}
}
