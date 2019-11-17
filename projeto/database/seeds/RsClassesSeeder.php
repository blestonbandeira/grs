<?php

use App\ClassState;
use Illuminate\Database\Seeder;
use App\RsClass;
use App\Course;
use App\CourseName;
use App\User;
use Carbon\Carbon;

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
        $rsClass->startDate = '2019-12-03';
        $users = User::select('id')->where('name', '=', 'Assist')->get();
        $rsClass->user_id = $users[0]["id"];
        $classStates = ClassState::select('id')->where('name', 'like', 'Turma Iniciada')->get();
        $rsClass->class_state_id = $classStates[0]["id"];
        $courseNames = CourseName::select('name')->where('id', '=', '1')->get();
        $rsClass->course_name_id = 1;
        $rsClass->name = getCourseName($courseNames, $rsClass->startDate); 
        $rsClass->save();      
        
        $rsClass = new RsClass;
        $rsClass->startDate = '2019-12-03';
        $users = User::select('id')->where('name', '=', 'Assist')->get();
        $rsClass->user_id = $users[0]["id"];
        $classStates = ClassState::select('id')->where('name', 'like', 'Turma Iniciada')->get();
        $rsClass->class_state_id = $classStates[0]["id"];
        $courseNames = CourseName::select('name')->where('id', '=', '2')->get();
        $rsClass->course_name_id = 2;
        $rsClass->name = getCourseName($courseNames, $rsClass->startDate); 
        $rsClass->save();    

        $rsClass = new RsClass;
        $rsClass->startDate = '2019-12-03';
        $users = User::select('id')->where('name', '=', 'Assist')->get();
        $rsClass->user_id = $users[0]["id"];
        $classStates = ClassState::select('id')->where('name', 'like', 'Turma Iniciada')->get();
        $rsClass->class_state_id = $classStates[0]["id"];
        $courseNames = CourseName::select('name')->where('id', '=', '7')->get();
        $rsClass->course_name_id = 7;
        $rsClass->name = getCourseName($courseNames, $rsClass->startDate); 
        $rsClass->save();  

        $rsClass = new RsClass;
        $rsClass->startDate = '2020-02-03';
        $users = User::select('id')->where('name', '=', 'Assist')->get();
        $rsClass->user_id = $users[0]["id"];
        $classStates = ClassState::select('id')->where('name', 'like', 'Turma Cancelada')->get();
        $rsClass->class_state_id = $classStates[0]["id"];
        $courseNames = CourseName::select('name')->where('id', '=', '5')->get();
        $rsClass->course_name_id = 5;
        $rsClass->name = getCourseName($courseNames, $rsClass->startDate); 
        $rsClass->save();  

        $rsClass = new RsClass;
        $rsClass->startDate = '2020-01-03';
        $users = User::select('id')->where('name', '=', 'Assist')->get();
        $rsClass->user_id = $users[0]["id"];
        $classStates = ClassState::select('id')->where('name', 'like', 'Turma Cancelada')->get();
        $rsClass->class_state_id = $classStates[0]["id"];
        $courseNames = CourseName::select('name')->where('id', '=', '6')->get();
        $rsClass->course_name_id = 6;
        $rsClass->name = getCourseName($courseNames, $rsClass->startDate); 
        $rsClass->save(); 

        $rsClass = new RsClass;
        $rsClass->startDate = '2019-11-03';
        $users = User::select('id')->where('name', '=', 'Assist')->get();
        $rsClass->user_id = $users[0]["id"];
        $classStates = ClassState::select('id')->where('name', '=', 'Turma Cancelada')->get();
        $rsClass->class_state_id = $classStates[0]["id"];
        $courseNames = CourseName::select('name')->where('id', '=', '4')->get();
        $rsClass->course_name_id = 4;
        $rsClass->name = getCourseName($courseNames, $rsClass->startDate); 
        $rsClass->save(); 
    
    }
}
