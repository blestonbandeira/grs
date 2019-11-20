<?php

namespace App\Http\Controllers;

use App\ClassState;
use App\RsClass;
use App\CourseName;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

class RsClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rsClasses = RsClass::all();

        $users = User::all()->pluck('name');
        
        $classStates = ClassState::all()->pluck('name');
        $courseNames = CourseName::all()->pluck('name');

        return view('rsClasses.index')
        ->with(compact('rsClasses', 
                    'courseNames',
                    'users',
                    'classStates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courseNames = CourseName::all();
        $users = User::all()->where('permission_level_id', '=', 2);
        $classStates = ClassState::all();
        
        return view('rsclasses.create')
                ->with(compact('rsclasses', 
                            'courseNames',
                            'users',
                            'classStates'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rsClass = new RsClass;
        $rsClass->startDate = $request->startDate;
        $rsClass->user_id = $request->user_id;
        $rsClass->class_stete_id = $request->class_state_id;
        $rsClass->course_name_id = $request->course_name_id;
        $courseName = CourseName::select('name')->where('id', '=', $rsClass->course_name_id);
        $rsClass->name = getCourseName($courseName, $rsClass->startDate);

        

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RsClass  $rsClass
     * @return \Illuminate\Http\Response
     */
    public function show(RsClass $rsClass)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RsClass  $rsClass
     * @return \Illuminate\Http\Response
     */
    public function edit(RsClass $rsClass)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RsClass  $rsClass
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RsClass $rsClass)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RsClass  $rsClass
     * @return \Illuminate\Http\Response
     */
    public function destroy(RsClass $rsClass)
    {
        //
    }
}
