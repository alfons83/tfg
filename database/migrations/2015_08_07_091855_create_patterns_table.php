<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatternsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patterns', function (Blueprint $table) {

            $table->increments('id');

            $table->string('title')->unique();
            $table->text('content');
            $table->string('path');
            $table->string('slug')->unique();
            $table->boolean('active');

            $table->enum('status',['Open','Closed']);

            $table->integer('user_id')->unsigned();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->integer('subcategory_id')->unsigned();

            $table->foreign('subcategory_id')
                ->references('id')
                ->on('pattern_subcategories')
                ->onDelete('cascade');

            $table->integer('rule_id')->unsigned();

            $table->foreign('rule_id')
                ->references('id')
                ->on('pattern_rules_nielsen')
                ->onDelete('cascade');

            $table->timestamps();

            $table->timestamp('published_at');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('patterns');
    }
}
