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
		$this->call('AccountsTableSeeder');
		$this->call('PalettesTableSeeder');
		$this->call('ColorsTableSeeder');
		$this->call('AccountUserPivotTableSeeder');
		$this->call('ImagesTableSeeder');
	}

}