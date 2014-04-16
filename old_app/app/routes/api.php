<?php

$account = Request::segment(3);
$token 	 = Request::segment(4);

Route::group(['prefix' => 'api/v1/{account}/{token}', 'before' => "api:{$account},{$token}"], function(){

	Route::bind('account', function($value, $route){
		return Account::with('images')->whereAccount($value)->first();
	});

	Route::resource('images', 'ImagesController');
	
});

/*
Route::group(['prefix' => 'api/v2', 'before' => 'auth'], function(){
	Route::resource('palettes', 'PalettesController');
	Route::resource('palettes.colors', 'ColorsController');
	Route::resource('images', 'ImagesController');
});
//*/

// php artisan generate:scaffold images --fields="url:string, parameters:string, red:tinyInteger:unsigned, green:tinyInteger:unsigned, blue:tinyInteger:unsigned, alpha:tinyInteger:unsigned, account_id:integer:unsinged"