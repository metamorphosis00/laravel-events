<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Event;
use Faker\Generator as Faker;

$factory->define(Event::class, function (Faker $faker) {
    return [
        'name'    => $faker->text,
        'address' => $faker->address,
        'date'    => $faker->dateTime,
        'user_id' => 15
    ];
});
