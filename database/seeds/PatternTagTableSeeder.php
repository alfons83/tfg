<?php

use Illuminate\Database\Seeder;

class PatternTagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pattern_tags');


        factory(App\Models\patterns\Tag::class, 50)->create();
    }
}
