<?php

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

$factory->define(App\Post::class, function ($faker) {

    return [
        'title'  => $faker->sentence(),
        'content'   => $faker->text,
        'slug' =>$faker->sentence(),
        'active' => $faker->boolean
    ];
});


$factory->define(App\Tag::class, function ($faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->text
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

