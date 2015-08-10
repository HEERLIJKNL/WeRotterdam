<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserProfilesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_profiles', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id');
			$table->string('gender');
			$table->string('firstname');
			$table->string('subname');
			$table->string('lastname');
			$table->string('street');
			$table->string('street_nr');
			$table->string('street_nr_add');
			$table->string('postalcode');
			$table->string('city');
			$table->string('country');
			$table->string('email');
			$table->string('telephone');
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
		Schema::drop('user_profiles');
	}

}
