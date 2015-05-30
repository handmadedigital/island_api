<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductOptionValuesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('product_option_values', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('product_option_id')->unsigned()->index();
			$table->foreign('product_option_id')->references('id')->on('product_options')->onDelete('cascade');
			$table->string('name');
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
		Schema::drop('product_options');
	}

}
