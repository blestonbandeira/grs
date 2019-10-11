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

    public function show(Calendar $calendar)
    {
        return response($calendar, 200);
    }

    public function update(Request $request, Calendar $calendar)
    {
        $calendar->title = $request->title;
        $time = Carbon::parse($request->start_event);
        $calendar->start_event = $time;
        $time = Carbon::parse($request->end_event);
        $calendar->end_event = $time;
        $calendar->save();
        return response($calendar, 200);
    }

    public function destroy(Calendar $calendar)
    {
        $calendar->delete();
    }
}
