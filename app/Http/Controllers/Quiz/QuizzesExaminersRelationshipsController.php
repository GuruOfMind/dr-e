<?php

namespace App\Http\Controllers\Quiz;

use App\Http\Controllers\Controller;
use App\Http\Requests\JSONAPIRelationshipRequest;
use App\Models\Quiz;
use App\Services\JSONAPIService;
use Illuminate\Http\Request;

class QuizzesExaminersRelationshipsController extends Controller
{
    
    public function __construct(JSONAPIService $service)
    {
        $this->service = $service;
    }

    public function index(Quiz $quiz)
    {
        return $this->service->fetchRelationship($quiz, 'examiners');
    }

    public function update(JSONAPIRelationshipRequest $request, Quiz $quiz)
    {
        return $this->service->updateManyToManyRelationships($quiz, 'examiners', $request->input('data.*.id'));
    }
}