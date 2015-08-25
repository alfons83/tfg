<?php

use Illuminate\Database\Seeder;

class BlogCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('blog_categories');


        factory(App\Models\blog\Category::class, 50)->create();
    }
}
