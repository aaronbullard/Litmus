<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('UsersTableSeeder');
		$this->call('PalettesTableSeeder');
		$this->call('ColorsTableSeeder');
		$this->call('ImagesTableSeeder');
	}

}