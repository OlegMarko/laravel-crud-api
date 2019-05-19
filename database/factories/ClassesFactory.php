<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Classes;
use Faker\Generator as Faker;
use App\Models\Teacher;

$factory->define(Classes::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(),
        'day' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'time' => $faker->date($format = 'H:i:s', $max = 'now'),
        'teacher_id' => Teacher::all()->random(1)[0]->id
    ];
});
