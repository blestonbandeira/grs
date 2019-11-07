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
        $rsClass->id_user = $users[0]["id"];
        $classStates = ClassState::select('id')->where('name', '=', 'Activo')->get();
        $rsClass->id_classState = $classStates[0]["id"];
        $courseNames = CourseName::select('name')->where('id', '=', '1')->get();
        $rsClass->name = getCourseName($courseNames, $rsClass->startDate); 
        $rsClass->save();      
        
        $rsClass = new RsClass;
        $rsClass->startDate = '2019-12-03';
        $users = User::select('id')->where('name', '=', 'Assist')->get();
        $rsClass->id_user = $users[0]["id"];
        $classStates = ClassState::select('id')->where('name', '=', 'Activo')->get();
        $rsClass->id_classState = $classStates[0]["id"];
        $courseNames = CourseName::select('name')->where('id', '=', '2')->get();
        $rsClass->name = getCourseName($courseNames, $rsClass->startDate); 
        $rsClass->save();    

        $rsClass = new RsClass;
        $rsClass->startDate = '2019-12-03';
        $users = User::select('id')->where('name', '=', 'Assist')->get();
        $rsClass->id_user = $users[0]["id"];
        $classStates = ClassState::select('id')->where('name', '=', 'Activo')->get();
        $rsClass->id_classState = $classStates[0]["id"];
        $courseNames = CourseName::select('name')->where('id', '=', '7')->get();
        $rsClass->name = getCourseName($courseNames, $rsClass->startDate); 
        $rsClass->save();  

        $rsClass = new RsClass;
        $rsClass->startDate = '2020-02-03';
        $users = User::select('id')->where('name', '=', 'Assist')->get();
        $rsClass->id_user = $users[0]["id"];
        $classStates = ClassState::select('id')->where('name', '=', 'Activo')->get();
        $rsClass->id_classState = $classStates[0]["id"];
        $courseNames = CourseName::select('name')->where('id', '=', '5')->get();
        $rsClass->name = getCourseName($courseNames, $rsClass->startDate); 
        $rsClass->save();  

        $rsClass = new RsClass;
        $rsClass->startDate = '2020-01-03';
        $users = User::select('id')->where('name', '=', 'Assist')->get();
        $rsClass->id_user = $users[0]["id"];
        $classStates = ClassState::select('id')->where('name', '=', 'Activo')->get();
        $rsClass->id_classState = $classStates[0]["id"];
        $courseNames = CourseName::select('name')->where('id', '=', '6')->get();
        $rsClass->name = getCourseName($courseNames, $rsClass->startDate); 
        $rsClass->save(); 

        $rsClass = new RsClass;
        $rsClass->startDate = '2019-11-03';
        $users = User::select('id')->where('name', '=', 'Assist')->get();
        $rsClass->id_user = $users[0]["id"];
        $classStates = ClassState::select('id')->where('name', '=', 'Activo')->get();
        $rsClass->id_classState = $classStates[0]["id"];
        $courseNames = CourseName::select('name')->where('id', '=', '4')->get();
        $rsClass->name = getCourseName($courseNames, $rsClass->startDate); 
        $rsClass->save(); 
    
    }
}
