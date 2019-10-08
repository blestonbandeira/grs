<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Calendar;

class ApiCalendarController extends Controller
{
    public function index()
    {
        return Calendar::orderBy('id')->get();
    }

    public function store(Request $request)
    {
        $event = new Calendar;
        $event->title = $request->title;
        $event->start_event = $request->start_event;
        $event->end_event = $request->end_event;
        $event->save();
        return response($event, 201);
    }

    public function show($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $event = Calendar::find($id);
        $event->title = $request->title;
        $event->start_event = $request->start_event;
        $event->end_event = $request->end_event;
        $event->save();
        return response($event, 200);
    }

    public function destroy($id)
    {
        Calendar::find($id)->delete();
    }
}
