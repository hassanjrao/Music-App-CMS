<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateTypeOfSongsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('songs', function (Blueprint $table) {
            $table->longText("image")->nullable()->change();
            $table->longText("streaming_url")->nullable()->change();
            $table->longText("artwork_url")->nullable()->change();
            $table->longText("song")->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('songs', function (Blueprint $table) {
            $table->string("image")->nullable()->change();
            $table->string("streaming_url")->nullable()->change();
            $table->string("artwork_url")->nullable()->change();
            $table->string("song")->change();
        });
    }
}
