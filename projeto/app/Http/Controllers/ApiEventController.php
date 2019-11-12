<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Event;
use App\User;
use Carbon\Carbon;
use DateTime;
use Auth;
use App\UnemployementSituation;
use App\RsClass;
use App\EventType;

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
        $userTemp = User::where('id','=', $request->id_user)->get();
        $eventTemp = EventType::where('id','=', $request->id_event_type)->get();
        $event = new Event;
        $event->id_user = $request->id_user;
        $event->title = $request->title . " User: " . $userTemp[0]["name"] . "/ Tipo: " . $eventTemp[0]["name"];
        $event->id_event_type = $request->id_event_type;
        $time = Carbon::parse($request->start_event);
        $event->start_event = $time;
        $time = Carbon::parse($request->end_event);
        $event->end_event = $time;
        $event->save();

        return response($event, 201);
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
