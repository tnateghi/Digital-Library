<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Article;
use App\User;
use Faker\Generator as Faker;

$factory->define(Article::class, function (Faker $faker) {

    $user = User::first();

    return [
        'title'   => $faker->realText(80),
        'body'    => $faker->realText(1500),
        'status'  => $faker->randomElement(['publish', 'draf']),
        'user_id' => $user->id,
    ];
});
