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


        factory(App\Models\patterns\Category::class)->create([

            /*'id' => '1',*/
            'name' => 'Getting input',
            'description' => ''


        ]);

        factory(App\Models\patterns\Category::class)->create([

            /*'id' => '2',*/
            'name' => 'Navigation',
            'description' => ''


        ]);
        factory(App\Models\patterns\Category::class)->create([

            /*'id' => '3',*/
            'name' => 'Dealing with data',
            'description' => ''


        ]);
        factory(App\Models\patterns\Category::class)->create([

            /*'id' => '4',*/
            'name' => 'Social',
            'description' => ''


        ]);
        factory(App\Models\patterns\Category::class)->create([

            /*'id' => '5',*/
            'name' => 'Miscellaneus',
            'description' => ''


        ]);

    }
}
