<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories');

   //     App\Category::truncate();

        factory(App\Category::class, 50)->create();
    }
}
