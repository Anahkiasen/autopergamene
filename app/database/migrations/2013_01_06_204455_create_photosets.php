<?php

class CreatePhotosets extends Migration
{
  public function up()
  {
    Schema::create('photosets', function($table) {
      $table->increments('id');
      $table->string('name');
      $table->string('slug');
      $table->timestamps();
    });
  }

  public function down()
  {
    Schema::drop('photosets');
  }
}
