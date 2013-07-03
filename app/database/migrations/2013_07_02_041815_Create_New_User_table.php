<?php

use Illuminate\Database\Migrations\Migration;

class CreateNewUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('user_accounts',function($table){
			$table->increments('id');
			$table->string('username')->unique();
			$table->string('password',200);
			$table->integer('role_id'); //roles 
			$table->integer('status_id'); //status
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
		//
		Schema::drop('user_accounts');
	}

}