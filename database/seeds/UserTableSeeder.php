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


        factory(App\Models\User::class)->create([

            'username' => 'alfons83',
            'first_name' => 'Alfonso',
            'last_name' => 'Serrano Albert',
            'full_name'   => 'Alfonso Serrano Albert',
            'email' => 'admin@admin.com',
            'type' => 'admin',
            'gender' => 'male',
            'active' => 'true',
            'password' => bcrypt('admin')
        ]);

        factory(App\Models\User::class, 49)->create();
    }
}
