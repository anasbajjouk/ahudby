<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuthorVideoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('author_video', function (Blueprint $table) {
            $table->unsignedInteger('author_id');
            $table->unsignedInteger('video_id');

            $table->foreign('author_id')
            ->references('id')
            ->on('authors');

            $table->foreign('video_id')
            ->references('id')
            ->on('videos');

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
        Schema::dropIfExists('author_video');
    }
}
