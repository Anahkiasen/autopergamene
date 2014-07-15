<?php

class CreateCategoriesLang extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('categories_lang', function ($table) {
			$table->increments('id');
			$table->string('lang');
			$table->string('description');
			$table->integer('category_id');
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
		Schema::drop('categories_lang');
	}
}
