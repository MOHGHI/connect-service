<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ContactReason;
use Faker\Generator as Faker;

$factory->define(ContactReason::class, function (Faker $faker) {
    return [
        'reason' => $faker->words(3,true),
    ];
});
