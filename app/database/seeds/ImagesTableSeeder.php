<?php

class ImagesTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('images')->truncate();

		$images = array(
			[
				'url' 			=> "https://www.google.com/images/srpr/logo11w.png",
				'parameters' 	=> '{}',
				'status'		=> 'done',
				'red'			=> 100,
				'green'			=> 100,
				'blue'			=> 100,
				'alpha'			=> 100,
				'user_id'		=> 1
			],
			[
				'url' 			=> "http://www.atlasproject.co/wp-content/uploads/2013/11/facebook.jpg",
				'parameters' 	=> '{"x1":10, "y1":10, "x2":300, "y2":300}',
				'status'		=> 'processing',
				'red'			=> NULL,
				'green'			=> NULL,
				'blue'			=> NULL,
				'alpha'			=> NULL,
				'user_id'		=> 1
			]

		);

		// Uncomment the below to run the seeder
		// DB::table('images')->insert($images);
	}

}
