<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Classes;
use Faker\Generator as Faker;
use App\Models\Teacher;

$factory->define(Classes::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(),
        'day' => $faker->dateTimeBetween($startDate = 'now', $endDate = '+5 days'),
        'time' => $faker->date($format = 'H:i', $max = 'now'),
        'teacher_id' => Teacher::all()->random(1)[0]
    ];
});
