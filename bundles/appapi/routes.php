<?php

Route::get('(:bundle)/register', 'appapi::api@register');
Route::post('(:bundle)/register', array('before' => 'csrf'),   'appapi::api@register');
