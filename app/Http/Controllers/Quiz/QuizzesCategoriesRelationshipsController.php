<?php

namespace App\Http\Controllers\Quiz;

use App\Http\Controllers\Controller;
use App\Http\Requests\JSONAPIRelationshipRequest;
use App\Models\Quiz;
use App\Services\JSONAPIService;
use Illuminate\Http\Request;

class QuizzesCategoriesRelationshipsController extends Controller
{
    
    public function __construct(JSONAPIService $service)
    {
        $this->service = $service;
    }

    public function index(Quiz $quiz)
    {
        return $this->service->fetchRelationship($quiz, 'categoeis');
    }

    public function update(JSONAPIRelationshipRequest $request, Quiz $quiz)
    {
        return $this->service->updateManyToManyRelationships($quiz, 'categoeis', $request->input('data.*.id'));
    }
}