<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',30);
            $table->string('email',30)->unique();
            $table->string('password',255);
            $table->date('birthDate')->nullable();
            $table->string('gender',6)->nullable();
            $table->string('address',50)->nullable();
            $table->string('phone',15)->nullable();
            $table->unsignedInteger('photo_id');

            $table->foreign('photo_id')
            ->references('id')
            ->on('photos');

            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
