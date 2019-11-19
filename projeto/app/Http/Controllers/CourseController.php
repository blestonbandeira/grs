<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\CourseName;
use App\CourseType;
use App\MinimumQualification;
use App\Regime;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::all();
        
        $courseNames = CourseName::all();        
        $courseTypes = CourseType::all()->pluck('name');
        $regimes = Regime::all()->pluck('name');
        $minimumQualifications = MinimumQualification::all()->pluck('name');
        
        return view('courses.index')
        ->with(compact('courses', 
                    'courseNames', 
                    'courseTypes', 
                    'regimes',
                    'minimumQualifications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::all();
        $courseNames = CourseName::all();
       
        $courseTypes = CourseType::all();
        $regimes = Regime::all();
        $minimumQualifications = MinimumQualification::all();


        return view('courses.create')
        ->with(compact('courses',
                'courseNames',
                'courseTypes',
                'regimes',
                'minimumQualifications'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $course = new Course;        
        $course->course_name_id = $request->course_name_id;
        $course->course_type_id = $request->course_type_id;
        $course->regime_id = $request->regime_id;
        $course->minimum_qualification_id = $request->minimum_qualification_id;
        $course->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
