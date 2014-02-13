<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStripecustomersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('stripecustomers', function(Blueprint $table) {
			$table->create();
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->string('customerId');
			$table->text('object')->nullable();
			$table->timestamps();
			$table->softDeletes();
		});

		Schema::table('stripecustomers', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
														->onUpdate('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('stripecustomers');
	}

}