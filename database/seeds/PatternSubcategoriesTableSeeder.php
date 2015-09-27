<?php

use Illuminate\Database\Seeder;

class PatternSubcategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pattern_subcategories');


        factory(App\Models\patterns\SubCategory::class)->create([

            /*'id' => '1',*/
            'name' => 'Forms',
            'description' => '',
            'category_id' => '1'

        ]);

        factory(App\Models\patterns\SubCategory::class)->create([

           /* 'id' => '2',*/
            'name' => 'Explaining the process',
            'description' => '',
            'category_id' => '1'

        ]);
        factory(App\Models\patterns\SubCategory::class)->create([

            /*'id' => '3',*/
            'name' => 'Community driven',
            'description' => '',
            'category_id' => '1'

        ]);

        factory(App\Models\patterns\SubCategory::class)->create([

            /*'id' => '4',*/
            'name' => 'Tabs',
            'description' => '',
            'category_id' => '2'

        ]);
        factory(App\Models\patterns\SubCategory::class)->create([

            /*'id' => '5',*/
            'name' => 'Jumping in hierarchy',
            'description' => '',
            'category_id' => '2'

        ]);
        factory(App\Models\patterns\SubCategory::class)->create([

            /*'id' => '6',*/
            'name' => 'Menus',
            'description' => '',
            'category_id' => '2'

        ]);
        factory(App\Models\patterns\SubCategory::class)->create([

           /* 'id' => '7',*/
            'name' => 'Content',
            'description' => '',
            'category_id' => '2'

        ]);

        factory(App\Models\patterns\SubCategory::class)->create([

            /*'id' => '8',*/
            'name' => 'Tables',
            'description' => '',
            'category_id' => '3'

        ]);
        factory(App\Models\patterns\SubCategory::class)->create([

            /*'id' => '9',*/
            'name' => 'Formatting data',
            'description' => '',
            'category_id' => '3'

        ]);
        factory(App\Models\patterns\SubCategory::class)->create([

            /*'id' => '10',*/
            'name' => 'Images',
            'description' => '',
            'category_id' => '3'

        ]);
        factory(App\Models\patterns\SubCategory::class)->create([

            /*'id' => '11',*/
            'name' => 'Search',
            'description' => '',
            'category_id' => '3'

        ]);

        factory(App\Models\patterns\Subcategory::class)->create([

            /*'id' => '12',*/
            'name' => 'Social',
            'description' => '',
            'category_id' => '4'

        ]);

        factory(App\Models\patterns\SubCategory::class)->create([

           /* 'id' => '13',*/
            'name' => 'Ego',
            'description' => '',
            'category_id' => '4'

        ]);

        factory(App\Models\patterns\SubCategory::class)->create([

            /*'id' => '14',*/
            'name' => 'Views',
            'description' => '',
            'category_id' => '5'

        ]);
        factory(App\Models\patterns\SubCategory::class)->create([

            /*'id' => '15',*/
            'name' => 'Shopping',
            'description' => '',
            'category_id' => '5'

        ]);
        factory(App\Models\patterns\SubCategory::class)->create([

           /* 'id' => '16',*/
            'name' => 'Increasing frequency',
            'description' => '',
            'category_id' => '5'

        ]);



    }
}
