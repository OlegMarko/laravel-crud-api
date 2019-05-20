<?php

use Illuminate\Database\Seeder;
use App\Models\Classes;
use App\Models\Student;

class StudentClassesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $classes = Classes::all();

        Student::all()->each(function ($student) use ($classes) {
            $student->classes()->attach(
                $classes->random(rand(1, 3))->pluck('id')->toArray()
            );
        });
    }
}
