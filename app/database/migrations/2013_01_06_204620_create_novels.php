<?php
use Illuminate\Database\Migrations\Migration;

class CreateNovels extends Migration
{
  public function up()
  {
    Schema::create('novels', function($table) {
      $table->string('id');
      $table->string('name');
      $table->text('description');
      $table->string('image');
      $table->timestamps();
    });
  }

  public function down()
  {
    Schema::drop('novels');
  }
}
