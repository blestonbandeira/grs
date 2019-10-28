<?php

namespace App\Http\Controllers;

use App\ApplicantEvent;
use Illuminate\Http\Request;
use App\Interview;
use App\InterviewInterviewer;
use Carbon\Carbon;
use App\Event;
use Auth;

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
        $interview = new Interview;
        $interview->id_applicant = $request->id_applicant;
        $time = Carbon::parse($request->date);
        $interview->date = $time;
        $interview->save();

        $interCreated = Interview::where('id_applicant', '=', $interview->id_applicant, 'and', 'date', '=', $time)->first();
        $interview_interviewer = new InterviewInterviewer;
        $interview_interviewer->id_interview = $interCreated->id;
        $interview_interviewer->id_user = Auth::id();
        $interview_interviewer->save();

        $event = new Event;
        $event->id_user = Auth::id();
        $event->title = Auth::name() + " " + Applicant::name()->where('id', '=', $request->id_applicants);
        $event->type = $request->type;
        $event->start_event = $time;
        $event->end_event = $time->addMinutes(45);
        $event->save();

        $eventCreated = Event::where('title', '=', $event->title, 'and', 'start_event', '=', $event->start_event)->first();
        $appli_event = new ApplicantEvent;
        $appli_event->id_applicant = $request->id_applicant;
        $appli_event->id_event = $eventCreated->id;
        $appli_event->save();

        return $request->id_applicant;
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
