<?php

Route::controller('litmus::admin');

//Route::controller('litmus::api');

Route::get('image/view', 'litmus::image@view');

Route::controller('litmus::image');