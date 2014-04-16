<?php

class AccountUserPivotTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('users')->truncate();

		$seeds = array(
			'account_id'	=> 1,
			'user_id'		=> 1
		);

		// Uncomment the below to run the seeder
		DB::table('account_user')->insert($seeds);
	}

}
