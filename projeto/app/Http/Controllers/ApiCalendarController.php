<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Calendar;
use Carbon\Carbon;

class ApiCalendarController extends Controller
{
    public function index()
    {
        $result = Calendar::orderBy('id')->get();
        $data = array();
        foreach($result as $row)
        {
            $data[] = array(
            'id'   => $row["id"],
            'title'   => $row["title"],
            'start'   => $row["start_event"],
            'end'   => $row["end_event"]
            );
        }
        return $data;
    }

    public function store(Request $request)
    {
        $event = new Calendar;
        $event->title = $request->title;
        $time = Carbon::parse($request->start_event);
        $event->start_event = $time;
        $time = Carbon::parse($request->end_event);
        $event->end_event = $time;
        $event->save();
        return response($event, 201);
    }

    public function show($id)
    {
        return Calendar::find($id)->get();
    }

    public function update($title, $start_event, $end_event, $id)
    {
        $event = Calendar::find($id)->get();
        $event->title = $title;
        $time = Carbon::parse($start_event);
        $event->start_event = $time;
        $time = Carbon::parse($end_event);
        $event->end_event = $time;
        $event->save();
        return response($event, 200);
    }

    public function destroy($id)
    {
        Calendar::find($id)->delete();
    }
}
