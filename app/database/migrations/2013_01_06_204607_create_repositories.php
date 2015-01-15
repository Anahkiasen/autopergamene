<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRepositories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('repositories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('content');
            $table->string('tags');

            $table->string('vendor');
            $table->string('package');

            $table->integer('order');
            $table->boolean('master');
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
        Schema::drop('repositories');
    }
}
