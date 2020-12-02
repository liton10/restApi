<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\PropertyAnalytics;
use Faker\Generator as Faker;


$factory->define(PropertyAnalytics::class, function (Faker $faker) {
	$vehicleId = $faker->numberBetween(20000, 30000);
	$insurerId = $faker->numberBetween(20000, 30000);
    return [
        'value' => rand(10,20),
    ];
});
