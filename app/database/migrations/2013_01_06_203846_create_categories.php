<?php

class CreateCategories extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('categories', function($table) {
			$table->string('id');
				$table->string('name');
				$table->string('link');
				$table->integer('order');
			$table->timestamps();

			$table->index('id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('categories');
	}
}
