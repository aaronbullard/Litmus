<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAccountsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('accounts', function(Blueprint $table) {
			$table->create();
			$table->increments('id');
			$table->string('account', 64);
			$table->string('token', 64);
			$table->integer('user_id')->unsigned();
			$table->timestamps();
		});

		Schema::table('accounts', function(Blueprint $table) {
			$table->foreign('user_id')
				  ->references('id')->on('users')
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
		Schema::drop('accounts');
	}

}
