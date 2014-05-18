<?php

App::error(function(Aaronbullard\Litmus\Exceptions\BaseException $exception, $code)
{

});

App::error(function(Aaronbullard\Litmus\Exceptions\NotAuthorizedException $exception, $code)
{
	return Response::json([
		'data'	 => NULL,
			'error'	 => [
				'message' 		=> $exception->getMessage(),
				'status_code' 	=> $exception->getCode()
			]
	], $exception->getCode());
});