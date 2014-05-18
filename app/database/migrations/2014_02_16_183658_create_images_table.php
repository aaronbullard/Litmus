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
			$table->string('path');
			$table->string('filename');
			$table->string('mime');
			$table->string('parameters')->nullable();
			$table->string('callback')->nullable();
			$table->enum('status', ['queued', 'processing', 'completed', 'failed'])->default('queued');
			$table->tinyInteger('red')->nullable()->unsigned();
			$table->tinyInteger('green')->nullable()->unsigned();
			$table->tinyInteger('blue')->nullable()->unsigned();
			$table->tinyInteger('alpha')->nullable()->unsigned();
			$table->integer('user_id')->unsinged();
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
