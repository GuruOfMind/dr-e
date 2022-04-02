<?php

use App\Http\Controllers\Answer\AnswerController;
use App\Http\Controllers\Answer\AnswersQuestionsRelatedController;
use App\Http\Controllers\Answer\AnswersQuestionsRelationshipsController;
use App\Http\Controllers\Category\CategoriesQuizzesRelatedController;
use App\Http\Controllers\Category\CategoriesQuizzesRelationshipsController;
use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\Examiner\ExaminerController;
use App\Http\Controllers\Examiner\ExaminersQuizzesRelatedController;
use App\Http\Controllers\Examiner\ExaminersQuizzesRelationshipsController;
use App\Http\Controllers\Question\QuestionController;
use App\Http\Controllers\Quiz\QuizController;
use App\Http\Controllers\Quiz\QuizzesCategoriesRelatedController;
use App\Http\Controllers\Quiz\QuizzesExaminersRelatedController;
use App\Http\Controllers\Quiz\QuizzesExaminersRelationshipsController;
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
Route::get('categories/{id}/relationships/quizzes', [CategoriesQuizzesRelationshipsController::class, 'index'])->name('categories.relationships.quizzes');
Route::get('categories/{id}/quizzes', [CategoriesQuizzesRelatedController::class, 'index'])->name('categories.quizzes');

Route::apiResource('examiners', ExaminerController::class);
Route::get('examiners/{id}/relationships/quizzes', [ExaminersQuizzesRelationshipsController::class, 'index'])->name('examiners.relationships.quizzes');
Route::get('examiners/{id}/quizzes', [ExaminersQuizzesRelatedController::class, 'index'])->name('examiners.quizzes');

Route::apiResource('quizzes', QuizController::class);
Route::get('quizzes/{id}/relationships/categories', [QuizzesCategoriesRelationshipsController::class, 'index'])->name('quizzes.relationships.categories');
Route::get('quizzes/{id}/categories', [QuizzesCategoriesRelatedController::class, 'index'])->name('quizzes.categories');
Route::get('quizzes/{id}/relationships/examiners', [QuizzesExaminersRelationshipsController::class, 'index'])->name('quizzes.relationships.examiners');
Route::get('quizzes/{id}/examiners', [QuizzesExaminersRelatedController::class, 'index'])->name('quizzes.examiners');

Route::apiResource('questions', QuestionController::class);

Route::apiResource('answers', AnswerController::class);
Route::get('answers/{id}/relationships/questions', [ AnswersQuestionsRelationshipsController::class , 'index'])->name('answers.relationships.questions');
Route::get('answers/{id}/questions', [AnswersQuestionsRelatedController::class, 'index'])->name('answers.questions');
