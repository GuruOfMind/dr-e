<?php

namespace App\Exceptions;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Routing\Router;
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

	public function report(Throwable $exception)
	{
		parent::report($exception);
	}
	
	public function render($request, Throwable $exception)
	{
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
						'pointer' => $key
						
					]
				];
			})
			->values();
		return response()->json([
			'errors' => $errors
		], $exception->status);
	}

	protected function prepareJsonResponse($request, Throwable $exception)
	{
		$duplicate_key_error = Str::contains($exception->getMessage(), ['SQLSTATE[23000]']);
		$db_connection_error = Str::contains($exception->getMessage(), ['SQLSTATE[HY000]']);

		$details = $exception->getMessage();
		
		if($db_connection_error) {
			$details = "Can not connect to Database please check your database configuration or check the database host availability.";
		}
		if($duplicate_key_error) {
			$details = "The resource you are trying to post is a unique resource and it's already exist before.";
		}

		return response()->json([
			'errors' => [
				[
					'title' => Str::title(Str::snake(class_basename( $exception ), ' ')),
					'details' => $details,
				]
			]
		], $this->isHttpException($exception) ? $exception->getStatusCode() : 500);
	}
}
