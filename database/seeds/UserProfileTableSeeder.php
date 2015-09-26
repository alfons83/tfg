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

        factory(App\Models\UserProfile::class)->create([

            'path' => '',
            'gender' => 'male',
            'birthdate' => '',
            'bio'=> 'Profesor de Secundaria y ciclos Formativos de la GVA. Actualmente terminando el Grado en Nuevas Tecnologías de la Información',
            'twitter' => '',
            'website' => '',
            'user_id' => '1'

        ]);



        /*factory(App\Models\UserProfile::class, 50)->create();*/
    }
}
