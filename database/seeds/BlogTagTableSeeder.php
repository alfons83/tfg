<?php

use Illuminate\Database\Seeder;

class BlogTagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('blog_tags');



        factory(App\Models\blog\Tag::class, 50)->create();

    }
}
