<?php

Route::post('queue/receive', function()
{
    return Queue::marshal();
});

Route::get('test', function(){
	$img = 'https://www.google.com/images/srpr/logo11w.png';
	
	return Litmus::average_color($img);
});