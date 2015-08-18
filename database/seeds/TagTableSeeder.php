<?php

use Illuminate\Database\Seeder;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('tags');

       // App\Tag::truncate();


        //DB::table('tags')->truncate();

        factory(App\Tag::class, 50)->create();

    }
}
