<?php

class AccountsTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('accounts')->truncate();

		$accounts = array(
			[
			'name'		=> 'Test Account',
			'account' 	=> 'a8ccd1d9c62d4ceddf1939f6407cb3b7',
			'token' 	=> '973324ef8bb9ee932e33185e9e136a84',
			'user_id'	=> 1,
			'created_at'=> new DateTime(),
			'updated_at'=> new DateTime()
			],
			[
			'name'		=> 'Other Test Account',
			'account' 	=> '1',
			'token' 	=> '1',
			'user_id'	=> 1,
			'created_at'=> new DateTime(),
			'updated_at'=> new DateTime()
			],

		);

		// Uncomment the below to run the seeder
		DB::table('accounts')->insert($accounts);
	}

}
