<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeaturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('features', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('client_id')->unsigned()->index();
            $table->integer('user_id')->unsigned()->nullable()->index();
            $table->string('title');
            $table->text('description')->nullable();
            $table->timestamp('target_date')->nullable();
            $table->string('url')->nullable();
            $table->text('areas');

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('client_id')
                  ->references('id')->on('clients')
                  ->onDelete('cascade');

            $table->foreign('user_id')
                  ->references('id')->on('users')
                  ->onDelete('set null'); // Because an employee getting fired doesn't stop the client wanting a feature
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('features', function (Blueprint $table) {
            $table->dropForeign(['client_id']);
            $table->dropForeign(['user_id']);
        });

        Schema::drop('features');
    }
}
