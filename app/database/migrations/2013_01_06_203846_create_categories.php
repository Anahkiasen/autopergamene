<?php

class CreateCategories extends Migration
{

  /**
   * Run the migrations.
   *
   * @return void
   */
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

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::drop('categories');
  }

}
