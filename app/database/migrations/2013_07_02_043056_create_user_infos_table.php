<?php

use Illuminate\Database\Migrations\Migration;

class CreateUserInfosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('user_infos',function($table){
			$table->increments('id');
			$table->integer('user_account_id')->unique();
			$table->string('first_name');
			$table->string('middle_name');
			$table->string('last_name');
			$table->string('email');
			$table->string('phone');
			$table->string('location',200);
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
		Schema::drop('user_infos');
	}

}