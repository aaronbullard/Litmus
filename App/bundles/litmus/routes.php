<?php

Route::get('litmus/admin', 'litmus::admin@index');

Route::get('litmus/admin/register', 'litmus::admin@register');

Route::any('litmus/admin/palette', 'litmus::admin@palette');

Route::get('litmus/admin/palette/(:num)', 'litmus::admin@palette_by_id');

Route::get('litmus/form', 'litmus::image@form');

Route::get('litmus/analysis', 'litmus::image@analysis');
