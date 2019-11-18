<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\UnemployementSituation;
use App\InterviewInterviewer;
use App\ApplicantEvent;
use App\EventType;
use App\Interview;
use Carbon\Carbon;
use App\Applicant;
use App\Category;
use App\RsClass;
use App\Event;
use App\User;
use DateTime;
use Auth;

class ApiEventController extends Controller
{
    public function index(Request $request)
    {
        $data = array();
        $lastId = -1;
        $lastColor = "#0089f2";
        $userR = User::where('id', '=', $request->user_id)->get();

        if($request->event_type_id == 0)
        {//CALENDARS
            if($userR[0]['permission_level_id'] == 1 || $userR[0]['permission_level_id'] == 2) 
            {
                $result = Event::orderBy('id')->get();
            }
            else if($userR[0]['permission_level_id'] == 3)
            {
                $result = Event::where([['user_id', '=', $request->user_id],['event_type_id','=', 1]])->orWhere([['user_id', '=', $request->user_id],['event_type_id','=', 4]])->orderBy('id')->get();
            } 
        }
        else if($request->event_type_id == 1)
        {//INTERVIEWS
            if($userR[0]['permission_level_id'] == 1 || $userR[0]['permission_level_id'] == 2)
            {
                $result = Event::where('event_type_id','=', $request->event_type_id)->orderBy('id')->get();
            }
            else if($userR[0]['permission_level_id'] == 3)
            {
                $result = Event::where([['user_id', '=', $request->user_id],['event_type_id','=', $request->event_type_id]])->orderBy('id')->get();
            } 

        }
        else if($request->event_type_id == 2 || $request->event_type_id == 3)
        {//TESTS && INVENTORIES
            if($userR[0]['permission_level_id'] == 1 || $userR[0]['permission_level_id'] == 2)
            {
                $result = Event::where('event_type_id','=', $request->event_type_id)->orderBy('id')->get();
            }
        }
        else if($request->event_type_id == 4)
        {//AVAILABILITIES
            if($userR[0]['permission_level_id'] == 1)
            {
                $result = Event::where('event_type_id','=', $request->event_type_id)->orderBy('id')->get();
            }
            else if($userR[0]['permission_level_id'] == 3)
            {
                $result = Event::where([['user_id', '=', $request->user_id],['event_type_id','=', $request->event_type_id]])->orderBy('id')->get();
            } 
        }

        foreach($result as $row)
        {
            if($row["user_id"] != $lastId){
                $lastColor = '#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
            }
 
            $data[] = array(
                'id'   => $row["id"],
                'user_id'   => $row["user_id"],
                'title'   => $row["title"],
                'type'   => $row["event_type_id"],
                'start'   => $row["start_event"],
                'end'   => $row["end_event"],
                'color' => $lastColor
            );
            $lastId = (Int)$row["user_id"];
        } 

        return $data;
    }

    public function store(Request $request)
    {
        $appliArray = $request->id_applicants;
        $categoryTemp = Category::select('id')->where('name', '=', 'Candidatura Em Processo R&S')->get();
        if($request->event_type_id == 1)
        {//INTERVIEWS
            $eventTemp = Event::find($request->id_event);
            $eventTypeTemp = EventType::find($request->event_type_id);
            $user_id = $eventTemp->user_id;
            $userTemp = User::find($user_id);

            $interview = new Interview;
            $interview->id_applicant = $request->id_applicant;
            $time = Carbon::parse($request->date);
            $interview->date = $time;
            $interview->save();
    
            $interCreated = Interview::where('id_applicant', '=', $interview->id_applicant, 'and', 'date', '=', $time)->first();
    
            $interview_interviewer = new InterviewInterviewer;
            $interview_interviewer->id_interview = $interCreated->id;
            $interview_interviewer->user_id = $user_id;
            $interview_interviewer->save();

            $startEventTemp = Carbon::parse($request->date);
            $endEventTemp = Carbon::parse($request->date)->addMinutes(45);

            $appliTemp = Applicant::find($request->id_applicant);
            $appliTemp->id_category = $categoryTemp[0]["id"];
            $appliTemp->save();
        }
        else if($request->event_type_id == 2 || $request->event_type_id == 3)
        {//PROVAS && INVENTORIES
            $startEventTemp = Carbon::parse($request->date);
            $endEventTemp = Carbon::parse($request->date)->addMinutes(120);
            
            $user_id = (int)$request->user_id;
            $userTemp = User::find((int)$user_id);
            $eventTypeTemp = EventType::find($request->event_type_id);
        }
        else if($request->event_type_id == 4)
        {//AVAILABILITIES
            $user_id = (int)$request->user_id;
            $userTemp = User::find((int)$user_id);
            $eventTypeTemp = EventType::find($request->event_type_id);
            $startEventTemp = Carbon::parse($request->start_event);
            $endEventTemp = Carbon::parse($request->end_event);
        }

        $newEvent = new Event;
        $newEvent->user_id = $user_id;
        $newEvent->title = "User: " . $userTemp->name . " Tipo: " . $eventTypeTemp->name;
        $newEvent->event_type_id = $request->event_type_id;
        $newEvent->start_event = $startEventTemp;
        $newEvent->end_event = $endEventTemp;
        $newEvent->save();


        $eventCreated = Event::where('user_id', '=', $newEvent->user_id)->where('event_type_id', '=', $newEvent->event_type_id)->where('start_event', '=', $newEvent->start_event)->first();
        if($request->event_type_id == 2 || $request->event_type_id == 3)
        {
            foreach($appliArray as $applicant)
            {
                $appliTemp = Applicant::find($applicant);
                $appliTemp->id_category = $categoryTemp[0]["id"];
                $appliTemp->save();

                $appli_event = new ApplicantEvent;
                $appli_event->id_applicant = $applicant;
                $appli_event->id_event = $eventCreated->id;
                $appli_event->save();
            }
        }
        else
        {
            $appliTemp = Applicant::find($applicant);
            $appliTemp->id_category = $categoryTemp[0]["id"];
            $appliTemp->save();
            
            $appli_event = new ApplicantEvent;
            $appli_event->id_applicant = $request->id_applicant;
            $appli_event->id_event = $eventCreated->id;
            $appli_event->save();
        }

        return response($appli_event, 201);
        // $userTemp = User::where('id','=', $request->user_id)->get();
        // $eventTemp = EventType::where('id','=', $request->event_type_id)->get();
    }

    public function show(Event $event)
    {
        return response($event, 200);
    }

    public function update(Request $request, Event $event)
    {
        $time = Carbon::parse($request->start_event);
        $event->start_event = $time;
        $time = Carbon::parse($request->end_event);
        $event->end_event = $time;
        $event->save();
        return response($event, 200);
    }

    public function destroy(Event $event)
    {
        $event->delete();
    }
}
