<?php

class ImagesTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('images')->truncate();

		$images = array(
			[
				'url' 			=> "url/image/here",
				'parameters' 	=> '{}',
				'status'		=> 'done',
				'red'			=> 100,
				'green'			=> 100,
				'blue'			=> 100,
				'alpha'			=> 100,
				'account_id'	=> 1
			],
			[
				'url' 			=> "url/image/other",
				'parameters' 	=> '{xOffet:100px, yOffset: 100px}',
				'status'		=> 'processing',
				'red'			=> NULL,
				'green'			=> NULL,
				'blue'			=> NULL,
				'alpha'			=> NULL,
				'account_id'	=> 1
			]

		);

		// Uncomment the below to run the seeder
		DB::table('images')->insert($images);
	}

}
