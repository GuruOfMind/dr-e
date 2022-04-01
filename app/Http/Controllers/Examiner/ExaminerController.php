<?php

namespace App\Http\Controllers\Examiner;

use App\Http\Controllers\Controller;
use App\Http\Requests\JSONAPIRequest;
use App\Models\Examiner;
use App\Http\Resources\JSONAPICollection;
use App\Http\Resources\JSONAPIResource;
use Spatie\QueryBuilder\QueryBuilder;

class ExaminerController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$examiners = QueryBuilder::for(Examiner::class)->allowedSorts(['name'])->get();
		return new JSONAPICollection($examiners);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \App\Http\Requests\StoreExaminerRequest  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(JSONAPIRequest $request)
	{
		$examiner = Examiner::create([
			'name' => $request->input('data.attributes.name'),
		]);
		return (new JSONAPIResource($examiner))
			->response()
			->header('Location', route('examiners.show', ['examiner' => $examiner]))
			->setStatusCode(201);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Models\Examiner  $examiner
	 * @return \Illuminate\Http\Response
	 */
	public function show(Examiner $examiner)
	{
		return (new JSONAPIResource($examiner))
			->response()
			->setStatusCode(200);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \App\Http\Requests\UpdateExaminerRequest  $request
	 * @param  \App\Models\Examiner  $examiner
	 * @return \Illuminate\Http\Response
	 */
	public function update(JSONAPIRequest $request, Examiner $examiner)
	{
		$examiner->update($request->input('data.attributes'));
		return (new JSONAPIResource($examiner))
			->response()
			->setStatusCode(200);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\Examiner  $examiner
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Examiner $examiner)
	{
		$examiner->delete();
		return response()
			->json(null)
			->setStatusCode(204);
	}
}
