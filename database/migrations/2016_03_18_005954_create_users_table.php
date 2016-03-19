<?php

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

            /*
                Data from Google+
             */
            $table->string('google_id')->unique(); // Yes, supposed to be a string - https://goo.gl/a42zwr
            $table->string('first_name');
            $table->string('last_name');
            $table->string('display_name');
            $table->string('email')->unique();
            $table->string('picture');

            /*
                OAuth tokens
             */
            $table->string('access_token')->nullable();

            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
