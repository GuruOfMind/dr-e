<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\JSONAPIRelationshipRequest;
use App\Models\Category;
use App\Services\JSONAPIService;

class CategoriesQuizzesRelationshipsController extends Controller
{
    
    public function __construct(JSONAPIService $service)
    {
        $this->service = $service;
    }

    public function index(Category $category)
    {
        return $this->service->fetchRelationship($category, 'quizzes');
    }

    public function update(JSONAPIRelationshipRequest $request, Category $category)
    {
        return $this->service->updateManyToManyRelationships($category, 'quizzes', $request->input('data.*.id'));
    }
}
