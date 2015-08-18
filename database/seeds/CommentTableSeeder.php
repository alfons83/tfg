<?php

use Illuminate\Database\Seeder;

class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments');

        //App\Comment::truncate();

        factory(App\Comment::class, 50)->create();
    }
}
