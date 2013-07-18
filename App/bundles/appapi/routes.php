<?php

Route::get('(:bundle)/validate/(:any)/(:any)', 'appapi::api@validate');

Route::get(array('(:bundle)', '(:bundle)/register'), 'appapi::api@register');

Route::get('(:bundle)/user/(:any)/(:any)', 'appapi::api@user');
Route::post('(:bundle)/user/(:any)/(:any)', 'appapi::api@user');

Route::post('(:bundle)/register', array('before' => 'csrf', 'uses' => 'appapi::api@register') );
