<?php

class PalettesTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('palettes')->truncate();

		$palettes = array(

		);

		// Uncomment the below to run the seeder
		// DB::table('palettes')->insert($palettes);
	
		DB::unprepared(
				"INSERT INTO `palettes` (`id`, `title`, `description`, `user_id`, `created_at`, `updated_at`) VALUES
				(1, 'Revlon''s Palette', 'Collection of colors used in foundation.', 1, '2013-08-15 00:53:24', '2013-08-15 00:53:24'),
				(2, 'Colgates''s Palette', 'Collection of teeth colors used for teeth whitening programs.', 1, '2013-08-15 00:53:24', '2013-08-15 00:53:24'),
				(3, 'Clairol''s Palette', 'Collection of colors used for hair dyeing.', 1, '2013-08-15 00:53:24', '2013-08-15 00:53:24');"
			);
	}

}
