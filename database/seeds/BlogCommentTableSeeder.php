<?php

use Illuminate\Database\Seeder;

class BlogCommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('blog_comments');



        factory(App\Models\blog\Comment::class, 50)->create();
    }
}
