<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\CancelReason;
use Faker\Generator as Faker;

$factory->define(CancelReason::class, function (Faker $faker) {
    return [
        'name' => $faker->words(3,true),
    ];
});
