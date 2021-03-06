<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductOptionValueVariantTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('product_option_value_variant', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('product_option_value_id')->unsigned()->index();
			$table->foreign('product_option_value_id')->references('id')->on('product_option_values')->onDelete('cascade');
			$table->integer('variant_id')->unsigned()->index();
			$table->foreign('variant_id')->references('id')->on('variants')->onDelete('cascade');
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
		Schema::drop('product_option_value_variant');
	}

}
