<?php

use Illuminate\Support\Str;


$factory->define(App\Models\User::class, function ($faker) {
    return [

     /*   'username' => $faker->userName,
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->unique()->email,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
        'type' => $faker->randomElement(['user','expert']),

        'active' => $faker->boolean*/

    ];
});

$factory->define(App\Models\UserProfile::class, function ($faker) {

    return [

       /* 'gender' => $faker->randomElement(['male','female']),
        'bio' => $faker->paragraph(rand(2,5)),
        'birthdate' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'twitter' => 'http://wwww.twitter.com/'.$faker->userName,
        'website' =>'http://www.'.$faker->domainName,
        'user_id' =>$faker->randomDigitNotNull*/

    ];
});


$factory->define(App\Models\patterns\Pattern::class, function ($faker) {




    return [


        /*'title'  => $faker->sentence(mt_rand(3,10)),
        'problem'   => join("n\n", $faker->paragraphs(mt_rand(3,6))),
        'usage'   => join("n\n", $faker->paragraphs(mt_rand(3,6))),
        'problem'   => join("n\n", $faker->paragraphs(mt_rand(3,6))),
        'status' => $faker->randomElement(['Open','Closed']),
        'user_id' =>$faker->randomDigitNotNull,
        'subcategory_id' =>$faker->randomDigitNotNull,
        'rule_id' =>$faker->randomDigitNotNull,
        'active' => $faker->boolean,
        'published_at' => $faker->dateTimeBetween('-1 month','+3 days')*/
    ];

});

$factory->define(App\Models\patterns\Vote::class, function ($faker) {

    return [

        /*'user_id' =>$faker->randomDigitNotNull,
        'pattern_id' =>$faker->randomDigitNotNull*/

    ];

});

$factory->define(App\Models\patterns\Category::class, function ($faker) {

   return [
        /*'name' => $faker->word,
        'description' => $faker->text,*/

    ];

});

$factory->define(App\Models\patterns\SubCategory::class, function ($faker) {
    return [
        /*'name' => $faker->word,
        'description' => $faker->text,
        'category_id' =>$faker->randomDigitNotNull*/
    ];
});




$factory->define(App\Models\patterns\Comment::class, function ($faker) {

    return [

        /*'comment' => $faker->text,
        'active' => $faker->boolean,
        'user_id' =>$faker->randomDigitNotNull,
        'pattern_id' =>$faker->randomDigitNotNull*/

    ];

});

$factory->define(App\Models\patterns\RulesNielsen::class, function ($faker) {
    return [
        /*'name' => $faker->word,
        'description' => $faker->text,*/
    ];
});

$factory->define(App\Models\patterns\Photos::class, function ($faker) {
    return [

    ];
});







