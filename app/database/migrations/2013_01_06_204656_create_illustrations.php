<?php

class CreateIllustrations extends Migration
{
  public function up()
  {
    Schema::create('illustrations', function($table) {
      $table->increments('id');
      $table->string('name');
      $table->string('media');
      $table->string('image');
      $table->boolean('thumbnail')->default(0);
      $table->integer('support_id');
      $table->timestamps();
    });
  }

  public function down()
  {
    Schema::drop('illustrations');
  }
}
