<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AvailabilitiesController extends Controller
{
    public function index()
    {
        return view('calendars.availabilities.index');
    }
}
