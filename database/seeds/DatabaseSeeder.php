<?php
/*
use App\Category;
use App\Comment;
use App\Ticket;
*/
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

            $this->call(UserTableSeeder::class);
            $this->call(PostTableSeeder::class);
            $this->call(TagTableSeeder::class);
            $this->call(UserProfileTableSeeder::class);
            $this->call(CategoryTableSeeder::class);
            $this->call(CommentTableSeeder::class);
            $this->call(TicketTableSeeder::class);
            $this->call(TicketVoteTableSeeder::class);


        Model::reguard();
    }
}
