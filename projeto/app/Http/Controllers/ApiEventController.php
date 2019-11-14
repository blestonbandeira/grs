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
        $userR = User::where('id', '=', $request->id_user)->get();

        if($request->id_event_type == 0)
        {//CALENDARS
            if($userR[0]['id_permissionLevel'] == 1 || $userR[0]['id_permissionLevel'] == 2) 
            {
                $result = Event::orderBy('id')->get();
            }
            else if($userR[0]['id_permissionLevel'] == 3)
            {
                $result = Event::where([['id_user', '=', $request->id_user],['id_event_type','=', 1]])->orWhere([['id_user', '=', $request->id_user],['id_event_type','=', 4]])->orderBy('id')->get();
            } 
        }
        else if($request->id_event_type == 1)
        {//INTERVIEWS
            if($userR[0]['id_permissionLevel'] == 1 || $userR[0]['id_permissionLevel'] == 2)
            {
                $result = Event::where('id_event_type','=', $request->id_event_type)->orderBy('id')->get();
            }
            else if($userR[0]['id_permissionLevel'] == 3)
            {
                $result = Event::where([['id_user', '=', $request->id_user],['id_event_type','=', $request->id_event_type]])->orderBy('id')->get();
            } 

        }
        else if($request->id_event_type == 2 || $request->id_event_type == 3)
        {//TESTS && INVENTORIES
            if($userR[0]['id_permissionLevel'] == 1 || $userR[0]['id_permissionLevel'] == 2)
            {
                $result = Event::where('id_event_type','=', $request->id_event_type)->orderBy('id')->get();
            }
        }
        else if($request->id_event_type == 4)
        {//AVAILABILITIES
            if($userR[0]['id_permissionLevel'] == 1)
            {
                $result = Event::where('id_event_type','=', $request->id_event_type)->orderBy('id')->get();
            }
            else if($userR[0]['id_permissionLevel'] == 3)
            {
                $result = Event::where([['id_user', '=', $request->id_user],['id_event_type','=', $request->id_event_type]])->orderBy('id')->get();
            } 
        }

        foreach($result as $row)
        {
            if($row["id_user"] != $lastId){
                $lastColor = '#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
            }
 
            $data[] = array(
                'id'   => $row["id"],
                'id_user'   => $row["id_user"],
                'title'   => $row["title"],
                'type'   => $row["id_event_type"],
                'start'   => $row["start_event"],
                'end'   => $row["end_event"],
                'color' => $lastColor
            );
            $lastId = (Int)$row["id_user"];
        } 

        return $data;
    }

    public function store(Request $request)
    {
        $eventTemp = Event::find($request->id_event);

        if($eventTemp->id_event_type == 1)
        {//INTERVIEWS
            $timeAddEnd = 45;
            
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
        }
        else if($eventTemp->id_event_type == 2)
        {//TESTS && PROVAS

        }
        else if($eventTemp->id_event_type == 3)
        {//TESTS && INVENTORIES

        }
        else if($eventTemp->id_event_type == 4)
        {//AVAILABILITIES

        }
        

        $event = new Event;
        $event->id_user = $request->id_user;
        $event->title = "User: " . $userTemp[0]["name"] . "<br/>Tipo: " . $eventTemp[0]["name"];
        $event->id_event_type = $request->id_event_type;
        $event->start_event = Carbon::parse($time);
        $event->end_event = Carbon::parse($time)->addMinutes($timeAddEnd);
        $event->save();
        
        
        $eventCreated = Event::where('id_user', '=', $event->id_user, 'and', 'id_event_type', '=', $event->id_event_type)->first();
    
        $appli_event = new ApplicantEvent;
        $appli_event->id_applicant = $request->id_applicant;
        $appli_event->id_event = $eventCreated->id;
        $appli_event->save();

        $appliTemp->id_category = $categoryTemp[0]["id"];
        $appliTemp->save();

        return response($appliTemp, 201);
        // $userTemp = User::where('id','=', $request->id_user)->get();
        // $eventTemp = EventType::where('id','=', $request->id_event_type)->get();
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
