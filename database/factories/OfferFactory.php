<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Offer;
use Faker\Generator as Faker;

$factory->define(Offer::class, function (Faker $faker) {
    $operators = \App\ConnectionProvider::pluck('id')->toArray();
    return [
        'name' => $faker->word,
        'connection_provider_id' => $faker->randomElement($operators)
    ];
});
