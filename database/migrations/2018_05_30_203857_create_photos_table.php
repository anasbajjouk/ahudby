<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->text('description');
            $table->unsignedInteger('author_id')->nullable();
            $table->unsignedInteger('period_id')->nullable();
            $table->unsignedInteger('user_id')->nullable();
            $table->string('path', 255);


            $table->foreign('author_id')
            ->references('id')
            ->on('authors');

            $table->foreign('period_id')
            ->references('id')
            ->on('periods');

            $table->foreign('user_id')
            ->references('id')
            ->on('users');

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
        Schema::dropIfExists('photos');
    }
}
