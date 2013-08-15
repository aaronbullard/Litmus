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
		
		$seed = array();
		for($r = 1; $r < 256; $r = $r*10){
			$array = array();
			$array['red'] = $r;
			for($g = 1; $g < 256; $g = $g*10){
				$array['green'] = $g;
				for($b = 1; $b < 256; $b = $b*10){
					$array['blue'] = $b;
					$array['name'] = "rgb($r, $g, $b)";
					$seed[] = $array;
				}
			}
		}
		
		
		foreach (Palette::all() as $p ){
			foreach( $seed as $rec ){
				$color = new Color;
				$color->fill($rec);
				$p->colors()->insert($color);
			}	
		}
		
		
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