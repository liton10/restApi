<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\AnalyticType;
use Illuminate\Support\Str;
use Faker\Generator as Faker;


$factory->define(AnalyticType::class, function (Faker $faker) {
    return [
        'name' => Str::random(10),
        'units' => Str::random(3),
        'is_numeric' => true,
        'num_decimal_places' => 1
    ];
});
