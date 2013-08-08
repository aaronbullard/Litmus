<?php

class Litmus_Create_Colors_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		
		Schema::table('colors', function($table){
			$table->create();
			$table->increments('id');
			$table->string('name');
			$table->integer('red');
			$table->integer('green');
			$table->integer('blue');
			$table->integer('alpha')->default(0);
			$table->string('hex', 7)->nullable();
			$table->string('account', 32)->nullable();
			$table->timestamps();
		});
		
		Schema::table('colors', function($table){
			$table->foreign('account')->references('account')
										->on('appapi_users')
										->on_update('cascade');
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('colors');
	}

}