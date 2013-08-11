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
			$table->integer('palette_id')->unsigned();
			$table->timestamps();
		});
		
		Schema::table('colors', function($table){
			$table->foreign('palette_id')->references('id')
										->on('palettes')
										->on_update('cascade')
										->on_delete('cascade');
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