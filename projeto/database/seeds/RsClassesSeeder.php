<?php

use App\ClassState;
use Illuminate\Database\Seeder;
use App\RsClass;
use App\Course;
use App\CourseName;
use App\User;

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
        $rsClass->startDate = "2019-12-03";
        $users = User::select('name')->where('id', '=', '2')->get();
        $rsClass->id_user = $users;
        $classStates = ClassState::select('name')->where('id', '=', '1');
        $rsClass->id_classState = $classStates;
        $courses = Course::select('id')->where('id_courseName', '=', '$courses->id')->get();
        $rsClass->id_course = $courses;  
        $courseNames = CourseName::select('name')->where('id', '=', '$course_names->id')->get();
        $rsClass->name = getCourseName($courseNames, $rsClass->startDate);        
    
    }
}
