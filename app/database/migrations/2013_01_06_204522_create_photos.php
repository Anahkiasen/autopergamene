<?php

class CreatePhotos extends Migration
{

  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('photos', function($table) {
      $table->increments('id');
        $table->string('name');
        $table->string('surname');
        $table->string('farm');
        $table->integer('thumbnail');
      $table->integer('photoset_id');
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
    Schema::drop('photos');
  }

}
