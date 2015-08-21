<?php

use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function ($faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->email,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
        'role' => $faker->randomElement(['user','editor']),
        'active' => $faker->boolean

    ];
});

$factory->define(App\User_profile::class, function ($faker) {

    return [
        'bio' => $faker->sentence(),
        'twitter' => $faker->userName,
        'website' =>$faker->domainName,
        'user_id' =>$faker->randomDigitNotNull
    ];
});

$factory->define(App\Tag::class, function ($faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->text,
        'post_id' =>$faker->randomDigitNotNull
    ];
});

$factory->define(App\Post::class, function ($faker) {

    $title = $faker->sentence(mt_rand(3,10));
    $slug  = Str::slug($title);

    return [
        'title'  => $title,
        'content'   => join("n\n", $faker->paragraphs(mt_rand(3,6))),
        'slug' => $slug,
        'user_id' =>$faker->randomDigitNotNull,
        'active' => $faker->boolean,
        'published_at' => $faker->dateTimeBetween('-1 month','+3 days')
    ];
});

$factory->define(App\Category::class, function ($faker) {

    return [
        'name' => $faker->word,
        'description' => $faker->text,
        'post_id' =>$faker->randomDigitNotNull
    ];

});

$factory->define(App\Comment::class, function ($faker) {

    return [
        'comment' => $faker->text,
        'active' => $faker->boolean,
        'user_id' =>$faker->randomDigitNotNull,
        'post_id' =>$faker->randomDigitNotNull

    ];

});

$factory->define(App\Ticket::class, function ($faker) {

    return [
        'title' => $faker->sentence(mt_rand(3,10)),
        'status' => $faker->randomElement(['Accepted','Waiting','Draft','Rejected']),
        'user_id' =>$faker->randomDigitNotNull

    ];

});

$factory->define(App\TicketVote::class, function ($faker) {

    return [

        'user_id' =>$faker->randomDigitNotNull,
        'ticket_id' =>$faker->randomDigitNotNull

    ];

});







