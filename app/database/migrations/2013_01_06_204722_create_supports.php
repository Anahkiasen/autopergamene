<?php

class CreateSupports extends Migration
{
  public function up()
  {
    Schema::create('supports', function($table) {
      $table->string('id');
      $table->string('name');
      $table->timestamps();
    });
  }

  public function down()
  {
    Schema::drop('supports');
  }
}
