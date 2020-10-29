<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Event;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(Event::class, function (Faker $faker) {
    $rand = rand(0, 31);

    $startingDate = $faker->dateTime;
    $endingDate = $faker->dateTimeBetween($startingDate, Carbon::parse($startingDate)->toDateTimeString() ." +$rand days");

    return [
        'name' => str_replace('.', '', $faker->sentence),
        'starting_date' => Carbon::parse($startingDate)->toDateString(),
        'ending_date' => Carbon::parse($endingDate)->toDateString(),
    ];
});
