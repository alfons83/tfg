<?php

use Illuminate\Database\Seeder;

class TicketVoteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ticket_votes');

       // App\TicketVote::truncate();

        factory(App\TicketVote::class, 50)->create();
    }
}