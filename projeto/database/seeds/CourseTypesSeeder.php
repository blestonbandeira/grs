<?php

use Illuminate\Database\Seeder;
use App\CourseType;

class CourseTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $courseType = new CourseType;
        $courseType->name = "Aprendizagem";
        $courseType->save();

        $courseType = new CourseType;
        $courseType->name = "Especialização Tecnológica";
        $courseType->save();

    }
}
