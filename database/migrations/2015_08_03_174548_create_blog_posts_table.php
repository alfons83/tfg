php <?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_posts', function (Blueprint $table) {

            $table->increments('id');
            $table->string('title')->unique();
            $table->text('content');
            $table->string('slug')->unique();
            $table->boolean('active');

            //$table->string('upload');

            $table->integer('user_id')->unsigned();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
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
        Schema::drop('blog_posts');
    }
}
