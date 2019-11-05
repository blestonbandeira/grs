<?php

use Illuminate\Database\Seeder;
use App\RsClass;
use App\Course;
use App\CourseName;

class RsClassesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rsClass = new RsClass;
        $courseName = CourseName::select('name')
                    ->join('courses', 'courses.id_courseName', '=', 'course_names.id')->get();
        $startDate = Course::select('startDate')
                    ->join('courses', 'courses.id_courseName', '=', 'course_names.id')->get();
        $rsClass->name = getCourseName($courseName, $startDate);
    }
}
