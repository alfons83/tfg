<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users');


        factory(App\User::class)->create([
            'name' => 'alfonso',
            'email' => 'admin@admin.com',
            'role' => 'admin',
            'password' => bcrypt('admin')
        ]);

        factory(App\User::class, 49)->create();
    }
}
