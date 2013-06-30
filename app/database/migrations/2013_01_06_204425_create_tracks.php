<?php

class CreateTracks extends Migration
{

  /**
   * Run the migrations.
   *
   * @return void
   */
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

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::drop('tracks');
  }

}
