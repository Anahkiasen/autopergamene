<?php

class CreateCollectionPhotoset extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('collection_photoset', function ($table) {
			$table->increments('id');
				$table->integer('collection_id');
				$table->integer('photoset_id');
			$table->nullableTimestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('collection_photoset');
	}
}
