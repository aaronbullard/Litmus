<?php

Autoloader::directories(array(
	path('bundle').'mockup/config',
	path('bundle').'mockup/libraries'
));

Autoloader::map(array(
	'Mockup\Util' => path('bundle').'mockup/libraries/Util.php'
));

// end bundle/mockup/start.php