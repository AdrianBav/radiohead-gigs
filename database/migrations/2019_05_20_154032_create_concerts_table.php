<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConcertsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('concerts', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('venue');
            $table->string('city');
            $table->string('country');

            $table->date('date');
        });

        Schema::create('concert_song', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('concert_id');
            $table->foreign('concert_id')->references('id')->on('concerts');

            $table->unsignedBigInteger('song_id');
            $table->foreign('song_id')->references('id')->on('songs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('concerts');
        Schema::dropIfExists('concert_song');
    }
}
