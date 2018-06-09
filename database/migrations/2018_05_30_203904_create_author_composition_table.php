<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuthorCompositionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('author_composition', function (Blueprint $table) {
            $table->unsignedInteger('author_id');
            $table->unsignedInteger('composition_id');

            $table->foreign('author_id')
            ->references('id')
            ->on('authors');

            $table->foreign('composition_id')
            ->references('id')
            ->on('compositions');

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
        Schema::dropIfExists('author_composition');
    }
}
