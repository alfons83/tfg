<?php

use Illuminate\Database\Seeder;

class PatternTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('patterns');


        factory(App\Models\patterns\Pattern::class, 50)->create();
    }
}
