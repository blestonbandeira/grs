<?php

namespace App\Http\Controllers;

use App\ApplicantEvent;
use Illuminate\Http\Request;
use App\Interview;
use App\InterviewInterviewer;
use Carbon\Carbon;

class ApiInterviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Interview::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $applRE = $request->id_applicants;
        foreach($appl as $applRE)
        {
            
        }
        $interview = new Interview;
        $interview->id_applicant = $request->id_applicants;
        $time = Carbon::parse($request->date);
        $interview->date = $request->$time;
        $interview->save();

        $interview_interviewer = new InterviewInterviewer;
        $interview_interviewer->id_interview = $request->id_interview;
        $interview_interviewer->id_user = Auth::id();
        $interview_interviewer->save();

        $event = new Event;
        $event->id_user = Auth::id();
        $event->title = $request->title;
        $event->type = $request->type;
        $event->start_event = $request->start_event;
        $event->end_event = $request->end_event;
        $event->save();

        $eventCreated = Event::Find($event);
        $appli_event = new ApplicantEvent;
        $appli_event->id_applicant = $request->id_applicant;
        $appli_event->id_event = $eventCreated->id;
        $appli_event->save();
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
