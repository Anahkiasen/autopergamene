<?php

class CreateTracks extends Migration
{
  public function up()
  {
    Schema::create('tracks', function($table) {
      $table->increments('id');
      $table->string('name');
      $table->string('soundcloud');
      $table->string('set');
      $table->integer('plays');
      $table->text('movements');
      $table->timestamps();
    });
  }

  public function down()
  {
    Schema::drop('tracks');
  }
}
