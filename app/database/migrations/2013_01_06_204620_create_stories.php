<?php
class CreateStories extends Migration
{
  public function up()
  {
    Schema::create('stories', function($table) {
      $table->string('id');
      $table->string('name');
      $table->text('description');
      $table->string('image');
      $table->timestamps();
    });
  }

  public function down()
  {
    Schema::drop('stories');
  }
}
