<?php
use Illuminate\Database\Migrations\Migration;

class CreateArticles extends Migration
{
  public function up()
  {
    Schema::create('articles', function($table) {
      $table->increments('id');
      $table->string('name');
      $table->string('summary');
      $table->text('content');
      $table->integer('category_id');
      $table->timestamps();
    });
  }

  public function down()
  {
    Schema::drop('articles');
  }
}
