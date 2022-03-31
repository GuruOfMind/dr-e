<?php

namespace App\Exceptions;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class Handler extends ExceptionHandler
{
	/**
	 * A list of the exception types that are not reported.
	 *
	 * @var array<int, class-string<Throwable>>
	 */
	protected $dontReport = [
		//
	];

	/**
	 * A list of the inputs that are never flashed for validation exceptions.
	 *
	 * @var array<int, string>
	 */
	protected $dontFlash = [
		'current_password',
		'password',
		'password_confirmation',
	];

	/**
	 * Register the exception handling callbacks for the application.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->reportable(function (Throwable $e) {
			//
		});
	}

	/**
	 * This function handle errors[404, 422, 500] related to resource not found, dupplicate key, and database connection
	 *
	 * @param Request $request
	 * @param Throwable $exception
	 * @return void
	 */
	public function render($request, Throwable $exception)
	{
		// This will replace our 404 response with
		// a JSON response.
		if ($exception instanceof ModelNotFoundException) {
			return response()->json([
				'data' => [],
				'error' => [
					'message' => "resource not found",
					'details' => "The resource you are trying to reach is not existing, try check the id you are passing in the URL."
				],
				'isSuccess' => false
			], 404);
		}
		// if ($exception instanceof QueryException) {
		// 	$duplicate_key = Str::contains($exception->getMessage(), ['SQLSTATE[23000]']);
		// 	$db_connection_error = Str::contains($exception->getMessage(), ['SQLSTATE[HY000]']);
		// 	if ($duplicate_key) {
		// 		return response()->json([
		// 			'data' => [],
		// 			'errors' => [
		// 				'message' => "Duplicate resource.",
		// 				'details' => "The resource you are trying to post is a unique resource and it's already exist before."
		// 			],
		// 			'isSuccess' => false
		// 		], 422);
		// 	}
		// 	if ($db_connection_error) {
		// 		return response()->json([
		// 			'data' => [],
		// 			'errors' => [
		// 				'message' => "Database connection problem.",
		// 				'details' => "Can not connect to Database please check your database configuration or check the dtabase host availability."
		// 			],
		// 			'isSuccess' => false
		// 		], 500);
		// 	}
		// }

		return parent::render($request, $exception);
	}

	protected function invalidJson($request, ValidationException $exception)
	{
		$errors = (new Collection($exception->validator->errors()))
			->map(function ($error, $key) {
				return [
					'title' => 'Validation Error',
					'details' => $error[0],
					'source' => [
						'pointer' => '/' . str_replace(
							'.',
							'/',
							$key
						),
					]
				];
			})
			->values();
		return response()->json([
			'errors' => $errors
		], $exception->status);
	}

	// protected function prepareJsonResponse($request, Throwable $e)
	// {
	// 	return response()->json([
	// 		'errors' => [
	// 			[
	// 				'title' => Str::title(Str::snake(class_basename(
	// 					$e
	// 				), ' ')),
	// 				'details' => $e->getMessage(),
	// 			]
	// 		]
	// 	], $this->isHttpException($e) ? $e->getStatusCode() : 500);
	// }
}
