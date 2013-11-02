<?php

class Litmus_Create_Users_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('users', function($table){
			$table->create();
			$table->increments('id');
			$table->string('email');
			$table->string('firstname');
			$table->string('lastname');
			$table->string('street');
			$table->string('city');
			$table->string('state', 2);
			$table->integer('zipcode');
			$table->string('phone', 10)->nullable();
			$table->string('account', 32)->nullable()->unique();
			$table->string('token', 32)->nullable();
			$table->timestamps();
		});
		
		
		$seed = array(
			array(1, 'jabullard@aol.com','James', 'Bullard', '7027 Williamsburg Blvd', 'Arlington', 'VA', 22213, '9107996952', NULL, NULL, new DateTime, new DateTime),
			array(2, 'abullard@viimed.com', 'James', 'Bullard', '3911 Appleton Way', 'Wilmington', 'NC', 28412, '9107996952', NULL, NULL, new DateTime, new DateTime),
			array(3, 'aaron.bullard77@gmail.com', 'James', 'Bullard', '1441 Rhode Island Ave., NW Apt 209', 'Washington', 'DC', 20005, '9107996952', NULL, NULL, new DateTime, new DateTime)
		);
		
		foreach($seed as $rec){
			$fields = array('id', 'email','firstname', 'lastname', 'street', 'city', 'state', 'zipcode', 'phone', 'account', 'token', 'create_at', 'updated_at');
			$insert = array();
			foreach($fields as $key => $field){
				$insert[$field] = $rec[$key];
			}
			$user = User::create($insert);
			$user->generate_account_hash(Config::get('litmus::private_key'))->save();
		}
		
		
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}