<?php

use Illuminate\Database\Seeder;
use App\Models\Classes;
use App\Models\Teacher;

class ClassesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Classes::class, 15)->create();
    }
}
