<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ConnectionProvider;
use Faker\Generator as Faker;

$factory->define(ConnectionProvider::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
    ];
});
