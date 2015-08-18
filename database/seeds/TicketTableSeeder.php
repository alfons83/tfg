<?php

use Illuminate\Database\Seeder;

class TicketTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tickets');

       // App\Ticket::truncate();

        factory(App\Ticket::class, 50)->create();
    }
}
