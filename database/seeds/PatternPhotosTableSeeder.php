<?php

use Illuminate\Database\Seeder;

class PatternPhotosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pattern_photos');

        /*factory(App\Models\patterns\Photos::class, 50)->create();*/

    }
}
