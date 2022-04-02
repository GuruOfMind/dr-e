<?php

namespace App\Http\Controllers\Examiner;

use App\Http\Controllers\Controller;
use App\Http\Requests\JSONAPIRequest;
use App\Models\Examiner;
use App\Http\Resources\JSONAPICollection;
use App\Http\Resources\JSONAPIResource;
use App\Services\JSONAPIService;
use Spatie\QueryBuilder\QueryBuilder;

class ExaminerController extends Controller
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
		return $this->service->fetchResources(Examiner::class, 'examiners');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \App\Http\Requests\StoreAnswerRequest  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(JSONAPIRequest $request)
	{
		return $this->service->createResource(Examiner::class, $request->input('data.attributes'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Models\Answer  $examiner
	 * @return \Illuminate\Http\Response
	 */
	public function show($examiner)
	{
		return $this->service->fetchResource(Examiner::class, $examiner, 'examiners');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \App\Http\Requests\UpdateAnswerRequest  $request
	 * @param  \App\Models\Answer  $examiner
	 * @return \Illuminate\Http\Response
	 */
	public function update(JSONAPIRequest $request, Examiner $examiner)
	{
		return $this->service->updateResource($examiner, $request->input('data.attributes'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\Answer  $examiner
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Examiner $examiner)
	{
		return $this->service->deleteResource($examiner);
	}
}
