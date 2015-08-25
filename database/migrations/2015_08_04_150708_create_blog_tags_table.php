<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_tags', function (Blueprint $table) {

            $table->increments('id');
            $table->string('name',20);
            $table->mediumText('description')->nullable();

            $table->integer('post_id')->unsigned();



            $table->foreign('post_id')
                ->references('id')
                ->on('blog_posts')
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
        Schema::drop('blog_tags');
    }
}
