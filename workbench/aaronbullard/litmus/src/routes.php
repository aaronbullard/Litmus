<?php

Route::post('/image/test', function(){

	$destinationPath = __DIR__.'/images';
	$filename 		 = 'tempfile';
	$image_path 	 = $destinationPath.'/'.$filename;

	if(Input::file('file')->isValid())
	{
		Input::file('file')->move($destinationPath, $filename);
	}
	
	$response 	= IR::process($image_path, ['bbox' => true]);

	return Response::json([
		'response'	=> $response->getBody()
	]);
});