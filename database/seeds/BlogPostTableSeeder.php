<?php

use Illuminate\Database\Seeder;


class BlogPostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('blog_posts');



        factory(App\Models\blog\Post::class, 50)->create();
    }
}
