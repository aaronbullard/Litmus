<?php

class Appapi_Create_Appapi_Users_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('appapi_tokens', function($table){
			$table->create();
			$table->increments('id');
			$table->string('email');
			$table->string('fname');
			$table->string('lname');
			$table->string('street');
			$table->string('city');
			$table->string('state', 2);
			$table->string('zipcode', 5);
			$table->string('phone', 10);
			$table->string('account', 64)->unique();
			$table->string('token', 64);
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
		Schema::drop('appapi_tokens');
	}

}