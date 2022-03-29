<?php

namespace App\Http\Controllers;

use App\Models\Examiner;
use App\Http\Requests\StoreExaminerRequest;
use App\Http\Requests\UpdateExaminerRequest;

class ExaminerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreExaminerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreExaminerRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Examiner  $examiner
     * @return \Illuminate\Http\Response
     */
    public function show(Examiner $examiner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Examiner  $examiner
     * @return \Illuminate\Http\Response
     */
    public function edit(Examiner $examiner)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Examiner  $examiner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Examiner $examiner)
    {
        //
    }
}
