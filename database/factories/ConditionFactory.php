<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Condition;
use Faker\Generator as Faker;

$factory->define(Condition::class, function (Faker $faker) {
    $offers = \App\Offer::pluck('id')->toArray();
    return [
        'name' => $faker->words(3,true),
        'offer_id' => $faker->randomElement($offers)
    ];
});
