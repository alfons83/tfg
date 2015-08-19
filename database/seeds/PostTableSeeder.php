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



        factory(App\Post::class, 50)->create();
    }
}
