<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use Carbon\Carbon;
use DateTime;
use Auth;

class ApiEventController extends Controller
{
    public function index(Request $request)
    {
        $data = array();
        $lastId = -1;
        $lastColor = "#f00";
        if($request->id_user == "1"){
            $result = Event::orderBy('id')->get();
            foreach($result as $row)
            {
                if(!$row["id_user"] == $lastId)
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
                'color' => "#zzz"
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
