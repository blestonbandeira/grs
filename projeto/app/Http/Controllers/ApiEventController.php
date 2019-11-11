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

class ApiEventController extends Controller
{
    public function index(Request $request)
    {
        $data = array();
        $lastId = -1;
        $lastColor = "#0089f2";
        $userR = User::where('id', '=', $request->id_user)->get();
        if($userR[0]['id_permissionLevel'] == 1){
            $result = Event::orderBy('id')->get();
            foreach($result as $row)
            {
                if($row["id_user"] != $lastId)
                    $lastColor = '#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
                
                $data[] = array(
                    'id'   => $row["id"],
                    'id_user'   => $row["id_user"],
                    'title'   => $row["title"],
                    'type'   => $row["type"],
                    'start'   => $row["start_event"],
                    'end'   => $row["end_event"],
                    'color' => $lastColor
                );
                
                $lastId = (Int)$row["id_user"];
            } 
        }else{
            $result = Event::where('id_user', '=', $request->id_user)->orderBy('id')->get();
            foreach($result as $row)
            {
                $data[] = array(
                'id'   => $row["id"],
                'id_user'   => $row["id_user"],
                'title'   => $row["title"],
                'type'   => $row["type"],
                'start'   => $row["start_event"],
                'end'   => $row["end_event"],
                'color' => "#0089f2"
                );
            }
        }

        return $data;
    }

    public function store(Request $request)
    {
        $event = new Event;
        $event->id_user = $request->id_user;
        $event->title = $request->title;
        $event->type = $request->type;
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
        $event->id_user = $request->id_user;
        $event->title = $request->title;
        $event->type = $request->type;
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
