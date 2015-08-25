<?php

use Illuminate\Database\Seeder;

class PatternVoteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pattern_votes');


        factory(App\Models\patterns\Vote::class, 50)->create();
    }
}
