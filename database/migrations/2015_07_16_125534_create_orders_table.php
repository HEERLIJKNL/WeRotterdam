<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('orders', function(Blueprint $table)
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
			$table->string('payment_method');
			$table->float('payment_total');
			$table->boolean('payed')->default(0);
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
		Schema::drop('orders');
	}

}
