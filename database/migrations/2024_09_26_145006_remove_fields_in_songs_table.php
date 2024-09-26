<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveFieldsInSongsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('songs', function (Blueprint $table) {

            $table->unsignedBigInteger('album_id')->nullable()->change();
            $table->unsignedBigInteger('genre_id')->nullable()->change();

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

                $table->unsignedBigInteger('album_id')->change();
                $table->unsignedBigInteger('genre_id')->change();
            
        });
    }
}
