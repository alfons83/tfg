<?php

use Illuminate\Database\Seeder;

class PatternCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pattern_categories');


        factory(App\Models\patterns\Category::class, 50)->create();
    }
}
