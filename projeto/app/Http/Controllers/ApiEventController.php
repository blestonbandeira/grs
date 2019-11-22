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
                $result = Event::where([['user_id', '=', $request->user_id],['event_type_id','=', 1]])->orWhere([['user_id', '=', $request->user_id],['event_type_id','=', 3]])->orderBy('id')->get();
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
        else if($request->event_type_id == 2)
        {//TESTS && INVENTORIES
            if($userR[0]['permission_level_id'] == 1 || $userR[0]['permission_level_id'] == 2)
            {
                $result = Event::where('event_type_id','=', $request->event_type_id)->orderBy('id')->get();
            }
        }
        else if($request->event_type_id == 3)
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
        $appliArray = $request->applicants_id;
        $categoryTemp = Category::select('id')->where('name', '=', 'Candidatura Em Processo R&S')->get();
        if($request->event_type_id == 1)
        {//INTERVIEWS
            $eventTemp = Event::find($request->event_id);
            $eventTypeTemp = EventType::find($request->event_type_id);
            $user_id = $eventTemp->user_id;
            $userTemp = User::find($user_id);

            $interview = new Interview;
            $interview->applicant_id = $request->applicant_id;
            $time = Carbon::parse($request->date);
            $interview->date = $time;
            $interview->result = "'sem resultado'";
            $interview->save();
    
            $interCreated = Interview::where('applicant_id', '=', $interview->applicant_id, 'and', 'date', '=', $time)->first();
    
            $interview_interviewer = new InterviewInterviewer;
            $interview_interviewer->interview_id = $interCreated->id;
            $interview_interviewer->user_id = $user_id;
            $interview_interviewer->save();

            $startEventTemp = Carbon::parse($request->date);
            $endEventTemp = Carbon::parse($request->date)->addMinutes(45);

            $appliTemp = Applicant::find($request->applicant_id);
            $appliTemp->category_id = $categoryTemp[0]["id"];
            $appliTemp->save();
        }
        else if($request->event_type_id == 2)
        {//PROVAS && INVENTORIES
            $startEventTemp = Carbon::parse($request->date);
            $endEventTemp = Carbon::parse($request->date)->addMinutes(120);
            
            $user_id = (int)$request->user_id;
            $userTemp = User::find((int)$user_id);
            $eventTypeTemp = EventType::find($request->event_type_id);
        }
        else if($request->event_type_id == 3)
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
        
        if($request->event_type_id == 1)
        {
            $idEventPost = (int)$request->availEvent;
            $availEvent = Event::where('id', '=', $idEventPost)->get();

            $tempDateStart1 = Carbon::parse($availEvent[0]["start_event"]);
            $tempDateEnd1 = Carbon::parse($newEvent->start_event);
            $tempDateStart2 = Carbon::parse($newEvent->end_event);
            $tempDateEnd2 = Carbon::parse($availEvent[0]["end_event"]);

            if($tempDateEnd1->diffInMinutes($tempDateStart1) > 45)
            {
                $newEventDiff = new Event;
                $newEventDiff->user_id = $availEvent[0]["user_id"];
                $newEventDiff->title = $availEvent[0]["title"];
                $newEventDiff->event_type_id = $availEvent[0]["event_type_id"];
                $newEventDiff->start_event = $tempDateStart1;
                $newEventDiff->end_event = $tempDateEnd1;
                $newEventDiff->save();
            }
            if($tempDateEnd2->diffInMinutes($tempDateStart2) > 45)
            {
                $newEventDiff = new Event;
                $newEventDiff->user_id = $availEvent[0]["user_id"];
                $newEventDiff->title = $availEvent[0]["title"];
                $newEventDiff->event_type_id = $availEvent[0]["event_type_id"];
                $newEventDiff->start_event = $tempDateStart2;
                $newEventDiff->end_event = $tempDateEnd2;
                $newEventDiff->save();
            }

            Event::where('id', '=', $idEventPost)->delete();

            $appliTemp = Applicant::find($request->applicant_id);
            $appliTemp->category_id = $categoryTemp[0]["id"];
            $appliTemp->save();
            
            $appli_event = new ApplicantEvent;
            $appli_event->applicant_id = $request->applicant_id;
            $appli_event->event_id = $eventCreated->id;
            $appli_event->save();
        }
        else if($request->event_type_id == 2)
        {
            foreach($appliArray as $applicant)
            {
                $appliTemp = Applicant::find($applicant);
                $appliTemp->category_id = $categoryTemp[0]["id"];
                $appliTemp->save();

                $appli_event = new ApplicantEvent;
                $appli_event->applicant_id = $applicant;
                $appli_event->event_id = $eventCreated->id;
                $appli_event->save();
            }
        }

        return response($newEvent, 201);
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
