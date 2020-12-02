<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Property;
use Illuminate\Support\Str;
use Faker\Generator as Faker;


$factory->define(Property::class, function (Faker $faker) {
    return  [
        'suburb' => Str::random(8),
        'state' => Str::random(3),
        'country' => $faker->country,
        'guid' => Str::uuid()->toString()
    ];
});
