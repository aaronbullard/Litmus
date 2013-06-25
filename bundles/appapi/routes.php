<?php

Route::get('(:bundle)', 'appapi::api@index');

Route::get('(:bundle)/register', 'appapi::api@register');
Route::post('(:bundle)/register', array('before' => 'csrf', 'uses' => 'appapi::api@register') );
