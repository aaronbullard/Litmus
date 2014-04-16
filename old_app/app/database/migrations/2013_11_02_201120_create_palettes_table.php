<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePalettesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('palettes', function(Blueprint $table) {
			$table->create();
			$table->increments('id');
			$table->string('title');
			$table->text('description');
			$table->integer('account_id')->unsigned();
			$table->integer('user_id')->unsigned();
			$table->timestamps();
		});

		Schema::table('palettes', function(Blueprint $table) {
			$table->foreign('account_id')
				  ->references('id')->on('accounts')
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
		Schema::drop('palettes');
	}

}
