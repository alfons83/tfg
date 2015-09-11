<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatternSubcategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('pattern_subcategories', function (Blueprint $table) {

            $table->increments('id');
            $table->string('name', 20);
            $table->mediumText('description')->nullable();

            $table->integer('category_id')->unsigned();


            $table->foreign('category_id')
                ->references('id')
                ->on('pattern_categories')
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
        Schema::drop('pattern_subcategories');
    }
}
