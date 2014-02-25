<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateImagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('images', function(Blueprint $table) {
			$table->increments('id');
			$table->string('url');
			$table->string('parameters')->nullable();
			$table->string('status', 10)->default('processing');
			$table->tinyInteger('red')->nullable()->unsigned();
			$table->tinyInteger('green')->nullable()->unsigned();
			$table->tinyInteger('blue')->nullable()->unsigned();
			$table->tinyInteger('alpha')->nullable()->unsigned();
			$table->integer('account_id')->unsinged();
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('images');
	}

}
