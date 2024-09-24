<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeetingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meetings', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('appointment_focus_id');
            $table->foreign('appointment_focus_id')->references('id')->on('appointment_focuses')->onDelete('cascade');

            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            $table->date('date');
            $table->time('time');


            $table->softDeletes();

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
        Schema::dropIfExists('meetings');
    }
}
