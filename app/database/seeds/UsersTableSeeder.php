<?php

class UsersTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('users')->truncate();

		$users = array(

		);

		// Uncomment the below to run the seeder
		// DB::table('users')->insert($users);
	
		DB::unprepared(
				"INSERT INTO `users` (`id`, `email`, `firstname`, `lastname`, `street`, `city`, `state`, `zipcode`, `phone`, `created_at`, `updated_at`) VALUES
				(1, 'jabullard@aol.com', 'James', 'Bullard', '7027 Williamsburg Blvd', 'Arlington', 'VA', 22213, '9107996952', '2013-08-15 00:53:24', '2013-08-15 00:53:24'),
				(2, 'abullard@viimed.com', 'James', 'Bullard', '3911 Appleton Way', 'Wilmington', 'NC', 28412, '9107996952', '2013-08-15 00:53:24', '2013-08-15 00:53:24'),
				(3, 'aaron.bullard77@gmail.com', 'James', 'Bullard', '1441 Rhode Island Ave., NW Apt 209', 'Washington', 'DC', 20005, '9107996952', '2013-08-15 00:53:24', '2013-08-15 00:53:24'),
				(4, 'abullard@viinetwork.net', 'Jim', 'Ballard', '2392 Road St.', 'Washington', 'DC', 20007, '2026077909', '2013-08-16 01:12:16', '2013-08-16 01:12:16');"
			);

	}

}
