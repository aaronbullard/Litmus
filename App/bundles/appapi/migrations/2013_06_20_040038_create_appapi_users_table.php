<?php

class Appapi_Create_Appapi_Users_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('appapi_users', function($table){
			$table->create();
			$table->increments('id');
			$table->string('email');
			$table->string('firstname');
			$table->string('lastname');
			$table->string('street');
			$table->string('city');
			$table->string('state', 2);
			$table->integer('zipcode');
			$table->string('phone', 10)->nullable();
			$table->string('account', 32)->nullable()->unique();
			$table->string('token', 32)->nullable();
			$table->timestamps();
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('appapi_users');
	}

}