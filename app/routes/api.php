<?php

$account = Request::segment(3);
$token 	 = Request::segment(4);

Route::group(['prefix' => 'api/v1', 'before' => "api:{$account},{$token}"], function(){

	Route::get('{account_id}/{token}/images', function($account_id){
		return Response::json(Image::whereAccountId($account_id)->get(), 200);
	});

	Route::get('{account_id}/{token}/images/{image_id}', function($account_id, $token, $image_id){
		return API::make( Image::find($image_id) );
	});

	Route::post('{account_id}/{token}/images', function($account_id, $token){
		$input = Input::all();
		$input['account_id'] = $account_id;
		// LATER ADD PARAMETERS HERE
		$image = Image::create($input);
		Event::fire('image.process', $image);
		return $image;
	});

	Route::delete('{account_id}/{token}/images/{image_id}', function($account_id, $token, $image_id){
		return API::make( Image::find($image_id)->delete() );
	});

	

});

Route::resource('images', 'ImagesController');

// php artisan generate:scaffold images --fields="url:string, parameters:string, red:tinyInteger:unsigned, green:tinyInteger:unsigned, blue:tinyInteger:unsigned, alpha:tinyInteger:unsigned, account_id:integer:unsinged"

// Route::controller('api', 'LitmusController');