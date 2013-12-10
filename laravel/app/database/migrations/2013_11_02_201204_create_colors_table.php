<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateColorsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('colors', function(Blueprint $table) {
			$table->create();
			$table->increments('id');
			$table->string('name', 30);
			$table->tinyInteger('red')->unsigned();
			$table->tinyInteger('green')->unsigned();
			$table->tinyInteger('blue')->unsigned();
			$table->tinyInteger('alpha')->unsigned();
			$table->string('hex', 7)->nullable();
			$table->integer('palette_id')->unsigned();
			$table->timestamps();
		});

		Schema::table('colors', function(Blueprint $table) {
			$table->foreign('palette_id')
				  ->references('id')->on('palettes')
				  ->onUpdate('cascade')
				  ->onDelete('cascade');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('colors');
	}

}
