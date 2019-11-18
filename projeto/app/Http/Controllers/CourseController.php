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
        $courseNames = CourseName::leftJoin('courses', 'courses.course_name_id', '=', 'course_names.id')->get();
        $courseTypes = CourseType::leftJoin('courses', 'courses.course_type_id', '=', 'course_types.id')->get();
        $regimes = Regime::leftJoin('courses', 'courses.regime_id', '=', 'regimes.id')->get();
        $minimumQualifications = MinimumQualification::leftJoin('courses', 'courses.minimum_qualification_id', '=', 'minimum_qualifications.id')->get();

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

        $courseNames = CourseName::all();

        return view('courses.create')
        ->with(compact('courses', 'courseNames'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
             
        $this->validate($request, [
            'course_name_id' => 'required',
            'course_type_id' => 'required',
            'regime_id' => 'required',
            'minimum_qualification_id' => 'required'
        ]);

        $course = new Course;
        $course->course_name_id = CourseName::where('course_names.name', '=', $request->name)->get();
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
