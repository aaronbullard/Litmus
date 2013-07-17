<?php

Autoloader::directories(array(
    path('bundle').'appapi/models',
    path('bundle').'appapi/views',
));


Autoloader::map(array(
	'User'	=> path('bundle').'appapi/models/user.php',
));