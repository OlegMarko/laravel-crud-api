<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Student;
use Faker\Generator as Faker;
use App\Models\Classes;

$factory->define(Student::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'age' => $faker->numberBetween(16, 40),
        'class_id' => Classes::all()->random(1)[0]->id
    ];
});
