<?php

Route::get('litmus/admin', 'litmus::admin@index');

Route::get('litmus/admin/register', 'litmus::admin@register');

Route::get('litmus/form', 'litmus::image@form');

Route::get('litmus/analysis', 'litmus::image@analysis');
