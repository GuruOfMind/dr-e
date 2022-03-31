<?php

namespace App\Http\Controllers;

use App\Models\Examiner;
use App\Http\Requests\StoreExaminerRequest;
use App\Http\Requests\UpdateExaminerRequest;
use App\Http\Resources\ExaminerCollection;
use App\Http\Resources\ExaminerResource;

class ExaminerController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$examiners = Examiner::paginate();
		return new ExaminerCollection($examiners);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \App\Http\Requests\StoreExaminerRequest  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(StoreExaminerRequest $request)
	{
		$examiner = Examiner::create([
			'name' => $request->input('data.attributes.name'),
		]);
		return (new ExaminerResource($examiner))
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
		return (new ExaminerResource($examiner))
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
	public function update(UpdateExaminerRequest $request, Examiner $examiner)
	{
		$examiner->update($request->input('data.attributes'));
		return (new ExaminerResource($examiner))
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
