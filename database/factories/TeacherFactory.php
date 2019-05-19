<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Teacher;
use Faker\Generator as Faker;

$factory->define(Teacher::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'job_title' => $faker->jobTitle,
        'age' => $faker->numberBetween(20, 50)
    ];
});
