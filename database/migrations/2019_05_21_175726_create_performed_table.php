<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerformedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('performed', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('concert_id');
            $table->foreign('concert_id')->references('id')->on('concerts');

            $table->unsignedBigInteger('song_id');
            $table->foreign('song_id')->references('id')->on('songs');

            $table->integer('order');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('performed');
    }
}
