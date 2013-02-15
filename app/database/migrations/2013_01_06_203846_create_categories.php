<?php
class CreateCategories extends Migration
{
  public function up()
  {
    Schema::create('categories', function($table) {
      $table->string('id');
      $table->string('name');
      $table->string('description');
      $table->string('link');
      $table->integer('order');
      $table->timestamps();
    });
  }

  public function down()
  {
    Schema::drop('categories');
  }
}
