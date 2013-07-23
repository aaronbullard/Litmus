<?php

Route::get('/', 'litmus::admin@index');

Route::controller('litmus::admin');

//Route::controller('litmus::image');

Route::get('image/form', 'litmus::image@form');

Route::get('image/analysis', 'litmus::image@analysis');
