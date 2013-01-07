<?php
use Illuminate\Database\Migrations\Migration;

class CreateRepositories extends Migration
{
  public function up()
  {
    Schema::create('repositories', function($table) {
      $table->increments('id');
      $table->string('name');
      $table->text('content');
      $table->string('tags');
      $table->string('link');
      $table->timestamps();
    });
  }

  public function down()
  {
    Schema::drop('repositories');
  }
}
