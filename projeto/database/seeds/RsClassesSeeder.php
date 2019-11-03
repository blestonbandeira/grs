<?php

use Illuminate\Database\Seeder;
use App\RsClass;

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
        $courseName = DB::table('course_names')
                        ->select('name')->join('courses', 'courses.id_courseName', '=', 'course_names.id')->get();
        $startDate = DB::('courses')->select('startDate')
        $rsClass->name = getCourseName($courseName) . ;
    }
}
