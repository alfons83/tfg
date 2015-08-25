<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatternCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pattern_categories', function (Blueprint $table) {

            $table->increments('id');
            $table->string('name');
            $table->mediumText('description')->nullable();
            $table->timestamps();

            $table->integer('pattern_id')->unsigned();

            $table->foreign('pattern_id')
                ->references('id')
                ->on('patterns')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pattern_categories');
    }
}
