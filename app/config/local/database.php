<?php

return array(

	'profile' => true,

	'connections' => array(

		'mysql' => array(
			'driver'   => 'mysql',
			'host'     => 'localhost',
            'unix_socket'   => '/Applications/MAMP/tmp/mysql/mysql.sock',
			'database' =>  'litmus_l4',
			'username' => 'root',
			'password' => 'root',
			'charset'  => 'utf8',
			'prefix'   => '',
		),

	),

);