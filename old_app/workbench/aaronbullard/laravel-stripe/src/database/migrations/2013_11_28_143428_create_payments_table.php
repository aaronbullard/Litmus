<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePaymentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('payments', function(Blueprint $table) {
			$table->create();
			$table->increments('id');
			$table->integer('stripecustomer_id')->unsigned();
			$table->string('action');
			$table->integer('amount');
			$table->string('currency')->default('USD');
			$table->enum('successful', array('T', 'F'))->nullable();
			$table->string('message')->nullable();
			$table->text('object')->nullable();
			$table->timestamps();
			$table->softDeletes();
		});

		Schema::table('payments', function(Blueprint $table) {
			$table->foreign('stripecustomer_id')->references('id')->on('stripecustomers')->onUpdate('cascade')->onDelete('restrict');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('payments');
	}

}
