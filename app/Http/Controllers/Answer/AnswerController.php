<?php

namespace App\Http\Controllers\Answer;

use App\Http\Controllers\Controller;
use App\Http\Requests\JSONAPIRequest;
use App\Models\Answer;
use App\Services\JSONAPIService;

class AnswerController extends Controller
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
		return $this->service->fetchResources(Answer::class, 'answers');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \App\Http\Requests\StoreAnswerRequest  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(JSONAPIRequest $request)
	{
		return $this->service->createResource(Answer::class, $request->input('data.attributes'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Models\Answer  $answer
	 * @return \Illuminate\Http\Response
	 */
	public function show($answer)
	{
		return $this->service->fetchResource(Answer::class, $answer, 'answers');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \App\Http\Requests\UpdateAnswerRequest  $request
	 * @param  \App\Models\Answer  $answer
	 * @return \Illuminate\Http\Response
	 */
	public function update(JSONAPIRequest $request, Answer $answer)
	{
		return $this->service->updateResource($answer, $request->input('data.attributes'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\Answer  $answer
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Answer $answer)
	{
		return $this->service->deleteResource($answer);
	}
}
