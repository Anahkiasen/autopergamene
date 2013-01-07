<?php
use Illuminate\Database\Migrations\Migration;

class CreateTracks extends Migration
{
  public function up()
  {
    Schema::create('tracks', function($table) {
      $table->increments('id');
      $table->string('name');
      $table->string('soundcloud');
      $table->text('movements');
      $table->timestamps();
    });
  }

  public function down()
  {
    Schema::drop('tracks');
  }
}
