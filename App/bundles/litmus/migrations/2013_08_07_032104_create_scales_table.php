<?php

class Litmus_Create_Scales_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('scales', function($table){
			$table->create();
			$table->increments('id');
			$table->string('title');
			$table->text('description')->nullable();
			$table->string('account', 32);
			$table->timestamps();
		});
		
		Schema::table('scales', function($table){
			$table->foreign('account')->references('account')
										->on('appapi_users')
										->on_update('cascade')
										->on_delete('cascade');
			$table->unique( array('title', 'account') );
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('scales');
	}

}