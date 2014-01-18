<?php

class CreateIllustrations extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('illustrations', function ($table) {
			$table->increments('id');
				$table->string('name');
				$table->string('media');
				$table->string('image');
				$table->boolean('thumbnail')->default(0);
			$table->integer('support_id');
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
		Schema::drop('illustrations');
	}
}
