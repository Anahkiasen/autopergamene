<?php
class CreateArticles extends Migration
{
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

  public function down()
  {
    Schema::drop('articles');
  }
}
