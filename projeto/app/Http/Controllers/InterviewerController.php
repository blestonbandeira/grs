<?php

namespace App\Http\Controllers;

use App\Interviewer;
use Illuminate\Http\Request;
use App\User;

class InterviewerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $interviewers = User::all()->where('permissionLevel', '=', 3);
        return view('interviewers.index')
        ->with(compact('interviewers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('interviewers.create')
        ->with(compact('interviewers'));
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
     * @param  \App\Interviewer  $interviewer
     * @return \Illuminate\Http\Response
     */
    public function show(Interviewer $interviewer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Interviewer  $interviewer
     * @return \Illuminate\Http\Response
     */
    public function edit(Interviewer $interviewer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Interviewer  $interviewer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Interviewer $interviewer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Interviewer  $interviewer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Interviewer $interviewer)
    {
        //
    }
}
