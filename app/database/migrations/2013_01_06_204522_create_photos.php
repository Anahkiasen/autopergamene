<?php
class CreatePhotos extends Migration
{
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

  public function down()
  {
    Schema::drop('photos');
  }
}
