<?php

Route::get( array('(:bundle)', '(:bundle)/form'), 'mockup::home@form');

Route::post('(:bundle)/form', 'mockup::home@form');
