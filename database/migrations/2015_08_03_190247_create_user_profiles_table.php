<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_profiles', function (Blueprint $table) {

            $table->increments('id');
            $table->string('path');
            $table->enum('gender', ['male', 'female']);
            $table->date('birthdate');
            $table->mediumText('bio')->nullable();
            $table->string('twitter')->nullable();
            $table->string('website')->nullable();
            $table->integer('user_id')->unsigned();



            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');

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
        Schema::drop('user_profiles');
    }
}
