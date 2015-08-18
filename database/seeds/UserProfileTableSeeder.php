<?php

use Illuminate\Database\Seeder;

class UserProfileTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_profiles');

       // App\User_profile::truncate();

        factory(App\User_profile::class, 50)->create();
    }
}
