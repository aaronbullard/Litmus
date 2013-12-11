<?php

Autoloader::directories(array(
	path('bundle').'mockup/config',
	path('bundle').'mockup/libraries',
	path('bundle').'litmus/libraries/Api'
));

Autoloader::map(array(
	'Mockup\Util' 		=> path('bundle').'mockup/libraries/Util.php',
	'Litmus\Api\Litmus'	=> path('bundle').'litmus/libraries/Litmus/Api/Litmus.php'
));

// end bundle/mockup/start.php