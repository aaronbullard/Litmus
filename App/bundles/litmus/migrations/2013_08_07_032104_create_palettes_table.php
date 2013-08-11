<?php

class Litmus_Create_Palettes_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('palettes', function($table){
			$table->create();
			$table->increments('id');
			$table->string('title');
			$table->text('description')->nullable();
			$table->integer('user_id')->unsigned();
			$table->timestamps();
		});
		
		Schema::table('palettes', function($table){
			$table->foreign('user_id')->references('id')
										->on('appapi_users')
										->on_update('cascade')
										->on_delete('cascade');
			$table->unique( array('title', 'user_id') );
		});
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('palettes');
	}

}