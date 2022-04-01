<?php

namespace App\Http\Controllers\Answer;

use App\Http\Controllers\Controller;
use App\Http\Requests\JSONAPIRequest;
use App\Models\Answer;
use App\Http\Resources\JSONAPICollection;
use App\Http\Resources\JSONAPIResource;
use Spatie\QueryBuilder\QueryBuilder;

class AnswerController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$answers = QueryBuilder::for(Answer::class)->allowedFilters(['is_correct', 'question_id'])->get();
		return new JSONAPICollection($answers);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \App\Http\Requests\StoreAnswerRequest  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(JSONAPIRequest $request)
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Models\Answer  $answer
	 * @return \Illuminate\Http\Response
	 */
	public function show(Answer $answer)
	{
		return (new JSONAPIResource($answer))->response()->setStatusCode(200);
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
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\Answer  $answer
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Answer $answer)
	{
		$answer->delete();
		return response()->json(null, 204);
	}
}
