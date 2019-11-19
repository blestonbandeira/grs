<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ApplicantEvent;
use App\Applicant;
use App\Event;

class ApiApplicantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $temp = 0;
        $applicant = Applicant::Where('id', '=', $id)->first();
        $appliHave = Event::whereIn('id', ApplicantEvent::select('event_id')->where('applicant_id', '=', $id)->get())->get();
        foreach($appliHave as $appli)
        {
            if($appli["event_type_id"] == 1)
            {
                if($temp == 0)
                {
                    $temp = 1;
                }
                else if($appli["event_type_id"] == 2)
                {
                    $temp = 3;
                }
            }
            else if($appli["event_type_id"] == 2)
            {
                if($temp == 0)
                {
                    $temp = 2;
                }
                else if($appli["event_type_id"] == 1)
                {
                    $temp = 3;
                }
            }
        }
        return [
            "id" => $applicant->id,
            "name" => $applicant->name,
            "type" => $temp,
        ];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
