<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

// Api routes
require __DIR__.'/routes/api.php';

// Litmus
require __DIR__.'/routes/auth.php';
require __DIR__.'/routes/palettes.php';
