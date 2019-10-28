<?php

namespace App\Http\Controllers;

use App\ApplicantEvent;
use Illuminate\Http\Request;
use App\Interview;
use App\InterviewInterviewers;
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
        foreach($request as $newReq){
            $interview = new Interview;
            $interview->id_applicant = $newReq->id_applicants;
            $time = Carbon::parse($newReq->date);
            $interview->date = $time;
            $interview->save();
    
            $interview_interviewer = new InterviewInterviewers;
            $interview_interviewer->id_interview = $newReq->id_interview;
            $interview_interviewer->id_user = Auth::id();
            $interview_interviewer->save();
    
            $event = new Event;
            $event->id_user = Auth::id();
            $event->title = $newReq->title;
            $event->type = $newReq->type;
            $event->start_event = $newReq->start_event;
            $event->end_event = $newReq->end_event;
            $event->save();
    
            $eventCreated = Event::where('title', '=', $event->title, 'and', 'start_event', '=', $event->start_event)->first();
            $appli_event = new ApplicantEvent;
            $appli_event->id_applicant = $newReq->id_applicants;
            $appli_event->id_event = $eventCreated->id;
            $appli_event->save();
        }

        return $request->id_applicants;
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
