<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSessionTimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('session_times', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('movie_id');
            $table->foreign('movie_id')->references('id')->on('movies');

            $table->unsignedInteger('cinema_id');
            $table->foreign('cinema_id')->references('id')->on('cinemas');

            $table->dateTime('datetime');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('session_times');
    }
}
