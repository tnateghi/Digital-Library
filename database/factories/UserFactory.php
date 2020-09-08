<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'level'       => 'user',
        'username'    => $faker->numerify('##########'),
        'firstName'   => $faker->firstNameMale,
        'lastName'    => $faker->lastName,
        'email'       => $faker->unique()->safeEmail,
        'tel'         => $faker->mobileNumber(),
        'address'     => $faker->building(),
        'password'    => $faker->password(),
        'created_at'  => $faker->date(),
        'remember_token' => Str::random(10),
    ];
});
