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
										->on('users')
										->on_update('cascade')
										->on_delete('cascade');
			$table->unique( array('title', 'user_id') );
		});
		
		$seed = array(
			array(
				'title'	=> 'Revlon\'s Palette',
				'description' => 'Collection of colors used in foundation.',
				'user_id'	=> 1
			),
			array(
				'title'	=> 'Colgates\'s Palette',
				'description' => 'Collection of teeth colors used for teeth whitening programs.',
				'user_id'	=> 1
			),
			array(
				'title'	=> 'Clairol\'s Palette',
				'description' => 'Collection of colors used for hair dyeing.',
				'user_id'	=> 1
			),
		);
		
		foreach($seed as $rec){
			Palette::create($rec);
		}
		
		
		
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