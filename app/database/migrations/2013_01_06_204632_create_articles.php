<?php

class CreateArticles extends Migration
{

  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('articles', function($table) {
      $table->increments('id');
      $table->string('name');
      $table->string('summary');
      $table->text('content');
      $table->string('tags');
      $table->string('slug');
      $table->integer('category_id');
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
    Schema::drop('articles');
  }

}
