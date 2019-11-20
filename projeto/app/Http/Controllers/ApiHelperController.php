<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class ApiHelperController extends Controller
{
    public function index(Request $request)
    {
        $palavras = preg_split('/(?=[A-Z])/', $request->courseName, null, PREG_SPLIT_NO_EMPTY);
        $acronimo = " ";

        foreach ($palavras as $p) {
            $acronimo .= $p[0];
        } 

        $year = Carbon::parse($request->startDate)->format('y');
        $month = Carbon::parse($request->startDate)->format('m');
        $acronimo = str_replace('[', '', $acronimo);
        $courseName = $acronimo . '_' . $month . '.' . $year;

        return response($courseName, 200);
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {

    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    
}

