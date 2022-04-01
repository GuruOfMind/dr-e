<?php

namespace App\Http\Controllers\Quiz;

use App\Http\Controllers\Controller;
use App\Http\Requests\JSONAPIRequest;
use App\Models\Quiz;
use App\Http\Resources\JSONAPICollection;
use App\Http\Resources\JSONAPIResource;
use Spatie\QueryBuilder\QueryBuilder;

class QuizController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$quizzes = QueryBuilder::for(Quiz::class)
			->allowedFilters(['examiner_id', 'category_id'])
			->allowedIncludes('examiner')
			->jsonPaginate();
		return new JSONAPICollection($quizzes);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \App\Http\Requests\StoreQuizRequest  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(JSONAPIRequest $request)
	{
		$quiz = Quiz::create($request->all());

		return (new JSONAPIResource($quiz))->response()->setStatusCode(201);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Models\Quiz  $quiz
	 * @return \Illuminate\Http\Response
	 */
	public function show($quiz)
	{
		$query = QueryBuilder::for($quiz)->allowedIncludes('examiner')->firstOrFail();

		return (new JSONAPIResource($query))->response()->setStatusCode(200);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \App\Http\Requests\UpdateQuizRequest  $request
	 * @param  \App\Models\Quiz  $quiz
	 * @return \Illuminate\Http\Response
	 */
	public function update(JSONAPIRequest $request, Quiz $quiz)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\Quiz  $quiz
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Quiz $quiz)
	{
		$quiz->delete();
		return response()->json(null, 204);
	}
}
