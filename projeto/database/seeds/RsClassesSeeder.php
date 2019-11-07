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
        $rsClass->startDate = "2019-12-03";
        $users = User::get('id')->pluck('id');
        $rsClass->id_user = $users[0]["id"];
        $classStates = ClassState::get('id')->pluck('id');
        $rsClass->id_classState = $classStates[0]["id"];
        $courseNames = CourseName::select('name')->where('id', '=', '1')->get();
        $rsClass->name = getCourseName($courseNames, $rsClass->startDate); 
        $rsClass->save();      
        
        $rsClass = new RsClass;
        $rsClass->startDate = "2019-12-03";
        $users = User::get('id')->pluck('id');
        $rsClass->id_user = $users[0]["id"];
        $classStates = ClassState::get('id')->pluck('id');
        $rsClass->id_classState = $classStates[0]["id"];
        $courseNames = CourseName::select('name')->where('id', '=', '2')->get();
        $rsClass->name = getCourseName($courseNames, $rsClass->startDate); 
        $rsClass->save();    

        $rsClass = new RsClass;
        $rsClass->startDate = "2019-12-03";
        $users = User::get('id')->pluck('id');
        $rsClass->id_user = $users[0]["id"];
        $classStates = ClassState::get('id')->pluck('id');
        $rsClass->id_classState = $classStates[0]["id"];
        $courseNames = CourseName::select('name')->where('id', '=', '7')->get();
        $rsClass->name = getCourseName($courseNames, $rsClass->startDate); 
        $rsClass->save();   
    
    }
}
