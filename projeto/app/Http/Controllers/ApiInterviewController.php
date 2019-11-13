<?php

namespace App\Http\Controllers;

use App\ApplicantEvent;
use Illuminate\Http\Request;
use App\Interview;
use App\InterviewInterviewer;
use Carbon\Carbon;
use App\Applicant;
use App\Category;
use App\Event;
use App\User;
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
        $eventTemp = Event::find($request->id_event);
        $id_user = $eventTemp->id_user;
        $userTemp = User::find($id_user);
        $appliTemp = Applicant::find($request->id_applicant);
        $categoryTemp = Category::select('id')->where('name', '=', 'Candidatura Em Processo R&S')->get();

        $interview = new Interview;
        $interview->id_applicant = $request->id_applicant;
        $time = Carbon::parse($request->date);
        $interview->date = $time;
        $interview->save();

        $interCreated = Interview::where('id_applicant', '=', $interview->id_applicant, 'and', 'date', '=', $time)->first();

        $interview_interviewer = new InterviewInterviewer;
        $interview_interviewer->id_interview = $interCreated->id;
        $interview_interviewer->id_user = $id_user;
        $interview_interviewer->save();
        
        $event = new Event;
        $event->id_user = $id_user;
        $event->title = $userTemp->name . " -> Entrevista"; 
        $event->id_event_type = 1;
        $event->start_event = $time;
        $event->end_event = Carbon::parse($time)->addMinutes(45);
        $event->save();
        
        $eventCreated = Event::where('id_user', '=', $event->id_user, 'and', 'id_event_type', '=', $event->id_event_type)->first();
    
        $appli_event = new ApplicantEvent;
        $appli_event->id_applicant = $request->id_applicant;
        $appli_event->id_event = $eventCreated->id;
        $appli_event->save();

        $appliTemp->id_category = $categoryTemp[0]["id"];
        $appliTemp->save();

        return $appliTemp;
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
