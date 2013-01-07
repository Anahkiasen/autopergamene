<?php
use Illuminate\Database\Migrations\Migration;

class CreateSupports extends Migration
{
  public function up()
  {
    Schema::create('supports', function($table) {
      $table->string('id');
      $table->string('name');
      $table->text('description');
      $table->timestamps();
    });
  }

  public function down()
  {
    Schema::drop('supports');
  }
}
