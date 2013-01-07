<?php
use Illuminate\Database\Migrations\Migration;

class CreateSocial extends Migration
{
  public function up()
  {
    Schema::create('social', function($table) {
      $table->increments('id');
      $table->string('name');
      $table->string('icon');
      $table->string('link');
      $table->timestamps();
    });
  }

  public function down()
  {
    Schema::drop('social');
  }
}
