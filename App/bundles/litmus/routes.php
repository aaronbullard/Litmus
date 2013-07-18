<?php

Route::get('/', 'litmus::admin@index');

Route::controller('litmus::admin');

Route::controller('litmus::image');

Route::get('image/view', 'litmus::image@view');
