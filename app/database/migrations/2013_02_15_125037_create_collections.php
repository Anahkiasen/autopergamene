<?php

class CreateCollections extends Migration
{

  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('collections', function($table) {
      $table->string('id');
        $table->string('name');
        $table->string('description');
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
    Schema::drop('collections');
  }

}
