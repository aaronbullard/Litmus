<?php

Route::get('litmus/admin', 'litmus::admin@index');

Route::get('litmus/admin/register', 'litmus::admin@register');


// Palettes Controller
Route::get('litmus/palettes', 'litmus::palettes@index');

Route::get('litmus/palettes/create', 'litmus::palettes@create');

Route::post('litmus/palettes', 'litmus::palettes@store');

Route::get('litmus/palettes/(:num)', 'litmus::palettes@show');

Route::get('litmus/palettes/(:num)/edit', 'litmus::palettes@edit');

Route::put('litmus/palettes/(:num)', 'litmus::palettes@update');

Route::delete('litmus/palettes/(:num)', 'litmus::palettes@destroy');



Route::get('litmus/form', 'litmus::image@form');

Route::get('litmus/analysis', 'litmus::image@analysis');
