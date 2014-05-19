<?php

App::error(function(Symfony\Component\HttpKernel\Exception\NotFoundHttpException $exception, $code)
{
	return Response::json([
		'data'	 => NULL,
			'error'	 => [
				'message' 		=> "URL not found!",
				'status_code' 	=> 401
			]
	], 404);
});

App::error(function(Litmus\Exceptions\BaseException $exception, $code)
{

});

App::error(function(Litmus\Exceptions\NotAuthorizedException $exception, $code)
{
	return Response::json([
		'data'	 => NULL,
			'error'	 => [
				'message' 		=> $exception->getMessage(),
				'status_code' 	=> $exception->getCode()
			]
	], 401);
});
