<?php
use Illuminate\Database\Migrations\Migration;

class CreateTableaux extends Migration
{
  public function up()
  {
    Schema::create('tableaux', function($table) {
      $table->increments('id');
      $table->string('name');
      $table->timestamps();
    });
  }

  public function down()
  {
    Schema::drop('tableaux');
  }
}
