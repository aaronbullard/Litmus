<?php

Autoloader::directories(array(
    path('app').'bundles/appapi/controllers',
    path('app').'bundles/appapi/models',
    path('app').'bundles/appapi/views',
));


Autoloader::map(array(
    'AppApi'    => path('app').'bundles/appapi/models/appapi.php',
));