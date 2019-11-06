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
        $rsClass->startDate =  "2019-12-03";
        $users = User::select('id')->where('name', '=', 'Assist')->get();
        $rsClass->id_user = $users[0]["id"];
        $classStates = ClassState::select('id')->where('name', '=', 'Activo');
        $rsClass->id_classState = $classStates;
        $courseNames = CourseName::select('name')->where('id', '=', '1')->get();
        $rsClass->name = getCourseName($courseNames, "2019-12-03"); 
        $rsClass->save();       
    
    }
}
