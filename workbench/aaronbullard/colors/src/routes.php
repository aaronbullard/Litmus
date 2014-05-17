<?php


Route::get('/colors', function()
{
	return Color::with('palette')->get();
});

Route::group(['before' => 'auth'], function()
{
	Route::resource('palettes', 'PaletteController', ['only' => ['index', 'store', 'show', 'update', 'destroy']]);
	Route::resource('palettes.colors', 'ColorController', ['only' => ['index', 'store', 'show', 'update', 'destroy']]);
});