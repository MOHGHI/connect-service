<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Request;
use Faker\Generator as Faker;

$factory->define(Request::class, function (Faker $faker) {
    $cities = \App\City::pluck('id')->toArray();
    $addresses = \App\Address::pluck('id')->toArray();
    $reasons = \App\ContactReason::pluck('id')->toArray();
    return [
        'name'       => $faker->name,
        'city_id'    => $faker->randomElement($cities),
        'address_id' => $faker->randomElement($addresses),
        'reason_id'  => $faker->randomElement($reasons),
        'phone'      => $faker->phoneNumber,
        'comment'    => $faker->words(3, true),
    ];
});
