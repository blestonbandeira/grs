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
        $courseNames = CourseName::select('id')->where('name', '=', 'Mecatrónica Automóvel, Planeamento e Controlo de Processos')->get();
        $course->id_courseName = $courseNames[0]["id"];
        $courseTypes = CourseType::select('id')->where('name', '=', 'Especialização Tecnológica')->get();
        $course->id_courseType = $courseTypes[0]["id"];
        $regimes = Regime::select('id')->where('name', '=', 'Diurno')->get();
        $course->id_regime = $regimes[0]["id"];
        $minimumQualifications = MinimumQualification::select('id')->where('name', '=', '12º Ano')->get();
        $course->id_minimumQualification = $minimumQualifications[0]["id"];
        $course->save();

        $course = new Course;
        $courseNames = CourseName::select('id')->where('name', '=', 'Mecatrónica Automóvel, Planeamento e Controlo de Processos')->get();
        $course->id_courseName = $courseNames[0]["id"];
        $courseTypes = CourseType::select('id')->where('name', '=', 'Especialização Tecnológica')->get();
        $course->id_courseType = $courseTypes[0]["id"];
        $regimes = Regime::select('id')->where('name', '=', 'Pós-Laboral')->get();
        $course->id_regime = $regimes[0]["id"];
        $minimumQualifications = MinimumQualification::select('id')->where('name', '=', '12º Ano')->get();
        $course->id_minimumQualification = $minimumQualifications[0]["id"];
        $course->save();
        
        $course = new Course;
        $courseNames = CourseName::select('id')->where('name', '=', 'Mecatrónica Automóvel')->get();
        $course->id_courseName = $courseNames[0]["id"];
        $courseTypes = CourseType::select('id')->where('name', '=', 'Aprendizagem')->get();
        $course->id_courseType = $courseTypes[0]["id"];
        $regimes = Regime::select('id')->where('name', '=', 'Diurno')->get();
        $course->id_regime = $regimes[0]["id"];
        $minimumQualifications = MinimumQualification::select('id')->where('name', '=', '9º Ano')->get();
        $course->id_minimumQualification = $minimumQualifications[0]["id"];
        $course->save();

        $course = new Course;
        $courseNames = CourseName::select('id')->where('name', '=', 'Mecatrónica')->get();
        $course->id_courseName = $courseNames[0]["id"];
        $courseTypes = CourseType::select('id')->where('name', '=', 'Aprendizagem')->get();
        $course->id_courseType = $courseTypes[0]["id"];
        $regimes = Regime::select('id')->where('name', '=', 'Diurno')->get();
        $course->id_regime = $regimes[0]["id"];
        $minimumQualifications = MinimumQualification::select('id')->where('name', '=', '9º Ano')->get();
        $course->id_minimumQualification = $minimumQualifications[0]["id"];
        $course->save();
    }
}
