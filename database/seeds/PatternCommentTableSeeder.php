<?php

use Illuminate\Database\Seeder;

class PatternCommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pattern_comments');


        factory(App\Models\patterns\Comment::class, 50)->create();
    }
}
