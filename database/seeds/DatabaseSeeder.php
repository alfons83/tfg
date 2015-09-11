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
            $this->call(PatternRulesNielsenTableSeeder::class);
            $this->call(PatternPhotosTableSeeder::class);
            $this->call(PatternCategoryTableSeeder::class);
            $this->call(PatternSubcategoriesTableSeeder::class);
            $this->call(PatternTableSeeder::class);
            $this->call(UserProfileTableSeeder::class);
            $this->call(PatternCommentTableSeeder::class);
            $this->call(PatternVoteTableSeeder::class);



        Model::reguard();
    }
}
