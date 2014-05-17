<?php

class UsersTableSeeder extends Seeder {

	public function run()
	{
		User::create([
			'id'		=> 1,
			'email'		=> 'JABullard@aol.com',
			'password'	=> Hash::make('test')
		]);
	}

}
