<?php

class CreatePhotos extends Migration
{

  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('photos', function($table) {
      $table->increments('id');

      // Photo name
      $table->string('name');
      $table->string('surname');

      // Photo images
      $table->string('farm');
      $table->integer('thumbnail');

      $table->integer('photoset_id');
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
    Schema::drop('photos');
  }

}
