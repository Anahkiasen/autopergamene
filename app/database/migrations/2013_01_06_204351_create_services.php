<?php

class CreateServices extends Migration
{
  public function up()
  {
    Schema::create('services', function($table) {
      $table->increments('id');
      $table->string('name');
      $table->string('icon');
      $table->string('link');
      $table->timestamps();
    });
  }

  public function down()
  {
    Schema::drop('services');
  }
}
