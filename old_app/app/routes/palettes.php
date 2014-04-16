<?php

Route::model('colors', 'Color');

Route::bind('palettes', function($value, $route){
	$palette = Palette::find($value);
	$account = $palette->account;
	if( Auth::user()->accounts()->whereAccountId($account->id)->count() )
	{
		return Palette::find($value);
	}
	return App::abort(404);
});

Route::group(['before' => "auth"], function(){
	Route::resource('palettes', 'PalettesController');
	Route::resource('palettes/{palettes}/colors', 'ColorsController');
});
