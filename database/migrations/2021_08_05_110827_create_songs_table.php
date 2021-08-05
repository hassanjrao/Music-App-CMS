<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSongsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('songs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("album_id")->nullable();
            $table->foreign("album_id")->references("id")->on("albums");
            $table->string("title");
            $table->string("genre");
            $table->string("image")->nullable();
            $table->string("description")->nullable();
            $table->string("dj_name")->nullable();
            $table->string("streaming_url")->nullable();
            $table->string("duration")->nullable();
            $table->boolean("explicit_layrics")->default(0);
            $table->string("song_played")->default("0");
            $table->boolean("private")->default(0);
            $table->timestamp("published_at");
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
        Schema::dropIfExists('songs');
    }
}
