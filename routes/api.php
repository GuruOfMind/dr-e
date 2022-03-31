<?php

use App\Http\Controllers\AnswerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ExaminerController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\QuizController;
use App\Models\Examiner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => 'auth:sanctum'], function () {
	Route::get('/user', function (Request $request) {
		return $request->user();
	});
});

Route::apiResource('categories', CategoryController::class);
Route::apiResource('examiners', ExaminerController::class);
Route::apiResource('quizzes', QuizController::class);
Route::apiResource('questions', QuestionController::class);
Route::apiResource('questions/{question}/answers', 'QuestionController@answers');
Route::apiResource('answers', AnswerController::class);
