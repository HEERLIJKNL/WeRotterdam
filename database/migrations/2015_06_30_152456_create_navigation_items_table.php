<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNavigationItemsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('navigation_items', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->char('button',40);
			$table->string('url');
			$table->boolean('active')->default(0);
			$table->tinyInteger('order');
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
		Schema::drop('navigation_items');
	}

}
