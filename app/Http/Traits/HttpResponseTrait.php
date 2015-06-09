<?php namespace App\Http\Traits;

use Illuminate\Http\Request;

trait HttpResponseTrait
{
	
	public function respondOK($data, $code=200)
	{
		$response = [
		'code' => $code,
		'status' => 'succcess',
		'data' => $data
		];
		return response()->json($response, $response['code']);
	}

	public function respond404()
	{
		$response = [
		'code' => 404,
		'status' => 'error',
		'data' => 'Resource Not Found',
		'message' => 'Not Found'
		];

		return response()->json($response, $response['code']);
	}

	public function respondError($code=400, $message=null)
	{
		$messages = [
			400 => "Bad Request",
			401 => "User not found or authenticated",
			402 => "Forbidden access",
			404 => "Not Found",
			405 => "Method not allowed",
			410 => "Resource deleted",
			500 => 'Unprocessable entity'
		];

		$response = [
		'code' => $code,
		'status' => 'error',
		'data' => [],
		'message' => ($mesage) ? $message : $messages[$code]
		];

		return response()->json($response, $response['code']);
	}
}