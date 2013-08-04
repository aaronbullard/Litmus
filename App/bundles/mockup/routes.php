<?php

Route::get( array('(:bundle)', '(:bundle)/form'), 'mockup::home@form');

Route::get( array('(:bundle)/image/(:any)'), 'mockup::home@image');

Route::post('(:bundle)/results', 'mockup::home@results');
