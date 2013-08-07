<?php

class Litmus_Create_Color_Scale_Pivot_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('color_scale', function($table){
			
			$table->engine = 'InnoDB';
			
			$table->increments('id');
			$table->integer('color_id');
			$table->integer('scale_id');
			$table->timestamps();

			$table->foreign('color_id')->references('id')
										->on('colors')
										->on_update('cascade')
										->on_delete('cascade');
			$table->foreign('scale_id')->references('id')
										->on('scales')
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
		Schema::drop('color_scale');
	}

}