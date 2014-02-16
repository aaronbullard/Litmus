<?php

Route::group(['prefix' => 'api', 'before' => 'api'], function(){
	$account_id = Request::segment(2);

	Route::get('{account_id}/{token}/images', function($account_id){
		return Image::whereAccountId($account_id)->get();
	});

	Route::get('{account_id}/{token}/images/{image_id}', function($account_id, $token, $image_id){
		return Image::find($image_id);
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
		return Image::find($image_id)->delete();
	});

	

});

Route::resource('images', 'ImagesController');

// php artisan generate:scaffold images --fields="url:string, parameters:string, red:tinyInteger:unsigned, green:tinyInteger:unsigned, blue:tinyInteger:unsigned, alpha:tinyInteger:unsigned, account_id:integer:unsinged"

// Route::controller('api', 'LitmusController');