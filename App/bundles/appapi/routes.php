<?php

Route::get('(:bundle)/validate/(:any)/(:any)', 'appapi::api@validate');

Route::get(array('(:bundle)', '(:bundle)/register'), 'appapi::api@register');
Route::post('(:bundle)/register', array('before' => 'csrf', 'uses' => 'appapi::api@register') );
