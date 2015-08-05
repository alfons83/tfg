<?php

use Illuminate\Database\Seeder;


class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('posts');

        App\Post::truncate();

        factory(App\Post::class, 20)->create();
    }
}
