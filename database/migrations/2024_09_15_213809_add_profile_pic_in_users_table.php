<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProfilePicInUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string("profile_pic")->nullable()->after("email");
            $table->string('phone')->nullable()->after("profile_pic");
            $table->string('date_of_birth')->nullable()->after("phone");
            $table->string('gender')->nullable()->after("date_of_birth");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn("profile_pic");
            $table->dropColumn("phone");
            $table->dropColumn("date_of_birth");
            $table->dropColumn('gender');
        });
    }
}
