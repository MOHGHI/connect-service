<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Address;
use Faker\Generator as Faker;

$factory->define(Address::class, function (Faker $faker) {
    $cities = \App\City::pluck('id')->toArray();
    return [
        'address' => $faker->address,
        'city_id' => $faker->randomElement($cities)
    ];
});
