<?php

Route::get('litmus/admin', 'litmus::admin@index');

Route::get('litmus/admin/register', 'litmus::admin@register');


// Palettes Controller
Route::get('litmus/palettes',				array('as' => 'palettes', 'uses' => 'litmus::palettes@index'));
Route::get('litmus/palettes/create',		'litmus::palettes@create');
Route::post('litmus/palettes',				'litmus::palettes@store');
Route::get('litmus/palettes/(:num)',		'litmus::palettes@show');
Route::get('litmus/palettes/(:num)/edit',	'litmus::palettes@edit');
Route::put('litmus/palettes/(:num)',		'litmus::palettes@update');
Route::delete('litmus/palettes/(:num)',		'litmus::palettes@destroy');

//table redirects for BELONGS TO
Route::get('litmus/palettes/(:num)/colors/(:num)/palette', function(){
	return Redirect::to_route('palettes');
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
