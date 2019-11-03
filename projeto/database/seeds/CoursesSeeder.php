<?php

use Illuminate\Database\Seeder;
use App\Course;
use App\CourseType;
use App\Regime;
use App\MinimumQualification;
use App\CourseName;

class CoursesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $course = new Course;
        $course->startDate = "2019-12-11";
        $courseNames = DB::table('course_names')->select('id')->where('name', '=', 'Técnico/a Especialista em Mecatrónica Automóvel, Planeamento e Controlo de Processos')->first();
        $course->id_courseName = $courseNames;
        $courseTypes = DB::table('course_types')->select('id')->where('name', '=', 'Especialização Tecnológica')->first();
        $course->id_courseType = $courseTypes;
        $regimes = DB::table('regimes')->select('id')->where('name', '=', 'Diurno')->first();
        $course->id_regime = $regimes;
        $minimumQualifications = DB::table('minimum_qualifications')->select('id')->where('name', '=', '12º Ano')->first();
        $course->id_minimumQualification = $minimumQualifications;
        $course->save();

        $course = new Course;
        $course->startDate = "2019-12-09";
        $courseNames = DB::table('course_names')->select('id')->where('name', '=', 'Técnico/a Especialista em Mecatrónica Automóvel, Planeamento e Controlo de Processos')->first();
        $course->id_courseName = $courseNames;
        $courseTypes = DB::table('course_types')->select('id')->where('name', '=', 'Especialização Tecnológica')->first();
        $course->id_courseType = $courseTypes;
        $regimes = DB::table('regimes')->select('id')->where('name', '=', 'Pós-Laboral')->first();
        $course->id_regime = $regimes;
        $minimumQualifications = DB::table('minimum_qualifications')->select('id')->where('name', '=', '12º Ano')->first();
        $course->id_minimumQualification = $minimumQualifications;
        $course->save();
        
        $course = new Course;
        $course->startDate = "2019-12-09";
        $courseNames = DB::table('course_names')->select('id')->where('name', '=', 'Técnico/a de Mecatrónica Automóvel')->first();
        $course->id_courseName = $courseNames;
        $courseTypes = DB::table('course_types')->select('id')->where('name', '=', 'Aprendizagem')->first();
        $course->id_courseType = $courseTypes;
        $regimes = DB::table('regimes')->select('id')->where('name', '=', 'Diurno')->first();
        $course->id_regime = $regimes;
        $minimumQualifications = DB::table('minimum_qualifications')->select('id')->where('name', '=', '9º Ano')->first();
        $course->id_minimumQualification = $minimumQualifications;
        $course->save();

        $course = new Course;
        $course->startDate = "2019-11-23";
        $courseNames = DB::table('course_names')->select('id')->where('name', '=', 'Técnico/a de Mecatrónica')->first();
        $course->id_courseName = $courseNames;
        $courseTypes = DB::table('course_types')->select('id')->where('name', '=', 'Aprendizagem')->first();
        $course->id_courseType = $courseTypes;
        $regimes = DB::table('regimes')->select('id')->where('name', '=', 'Diurno')->first();
        $course->id_regime = $regimes;
        $minimumQualifications = DB::table('minimum_qualifications')->select('id')->where('name', '=', '9º Ano')->first();
        $course->id_minimumQualification = $minimumQualifications;
        $course->save();
    }
}
