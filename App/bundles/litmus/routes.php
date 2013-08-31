<?php

// Users Controller
Route::get('litmus/users',					'litmus::users@index');
Route::get('litmus/users/create',			'litmus::users@create');
Route::post('litmus/users',					'litmus::users@store');
Route::get('litmus/users/(:num)',			'litmus::users@show');
Route::get('litmus/users/(:num)/edit',		'litmus::users@edit');
Route::put('litmus/users/(:num)',			'litmus::users@update');

Route::get('litmus/users/(:num)/palettes',	'litmus::users@palettes');
//table redirects for BELONGS TO
Route::get('litmus/palettes/(:num)/user', function($palette_id){
	$user_id = Palette::find($palette_id)->user()->first()->id;
	return Redirect::to('litmus/users/'.$user_id);
});
Route::get('litmus/users/(:num)/palettes/(:num)', function($user_id, $palette_id){
	return Redirect::to( 'litmus/palettes/'.$palette_id );
});


// Palettes Controller
Route::get('litmus/palettes',				array('as' => 'palettes', 'uses' => 'litmus::palettes@index'));
Route::get('litmus/palettes/create',		'litmus::palettes@create');
Route::post('litmus/palettes',				'litmus::palettes@store');
Route::get('litmus/palettes/(:num)',		'litmus::palettes@show');
Route::get('litmus/palettes/(:num)/edit',	'litmus::palettes@edit');
Route::put('litmus/palettes/(:num)',		'litmus::palettes@update');
Route::delete('litmus/palettes/(:num)',		'litmus::palettes@destroy');

//table redirects for BELONGS TO
Route::get('litmus/palettes/(:num)/colors/(:num)/palette', function($palette_id, $color_id){
	return Redirect::to('litmus/palettes/'.$palette_id);
});


// Colors Controller
Route::get('litmus/palettes/(:num)/colors',				array('as' => 'colors', 'uses' => 'litmus::colors@index'));
Route::get('litmus/palettes/(:num)/colors/create',		'litmus::colors@create');
Route::post('litmus/palettes/(:num)/colors',			'litmus::colors@store');
Route::get('litmus/palettes/(:num)/colors/(:num)',		'litmus::colors@show');
Route::get('litmus/palettes/(:num)/colors/(:num)/edit', 'litmus::colors@edit');
Route::put('litmus/palettes/(:num)/colors/(:num)',		'litmus::colors@update');
Route::delete('litmus/palettes/(:num)/colors/(:num)',	'litmus::colors@destroy');


Route::get('litmus/form', 'litmus::image@form');
Route::get('litmus/analysis', 'litmus::image@analysis');
