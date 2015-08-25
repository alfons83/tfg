<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatternTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('pattern_tags', function (Blueprint $table) {

            $table->increments('id');
            $table->string('name', 20);
            $table->mediumText('description')->nullable();

            $table->integer('pattern_id')->unsigned();


            $table->foreign('pattern_id')
                ->references('id')
                ->on('patterns')
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
        Schema::drop('pattern_tags');
    }
}
