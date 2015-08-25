<?php


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
            $this->call(BlogPostTableSeeder::class);
            $this->call(BlogTagTableSeeder::class);
            $this->call(PatternTableSeeder::class);
            $this->call(PatternTagTableSeeder::class);
            $this->call(UserProfileTableSeeder::class);
            $this->call(BlogCategoryTableSeeder::class);
            $this->call(BlogCommentTableSeeder::class);
            $this->call(PatternCategoryTableSeeder::class);
            $this->call(PatternCommentTableSeeder::class);
            $this->call(PatternVoteTableSeeder::class);


        Model::reguard();
    }
}
