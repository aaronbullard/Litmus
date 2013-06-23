<?php

Autoloader::directories(array(
  //  path('bundle').'appapi/controllers',
    path('bundle').'appapi/models',
    path('bundle').'appapi/views',
));


Autoloader::map(array(
	'AppApi'				=> path('bundle').'appapi/models/appapi.php',
  //  'Appapi_Api_Controller'	=> path('bundle').'appapi/controllers/api.php',
));