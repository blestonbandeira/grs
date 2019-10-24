<?php

namespace App\Http\Controllers;

use App\Form;
use App\Interview;
use App\InterviewInterviewer;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('form.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('form.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $interview = new Interview;
        $interview->id_applicant = 3;



        $form = new Form;
        $form->id_interview = 2;
        $form->interviewer = 1;
        $form->date = Carbon::now()->format('Y-MM-DD HH:mm:ss');
        $form->applicantName = "7";
        $form->firstCourseOption = $request->firstCourseOption;
        $form->motivation = $request->motivation;
        $form->preferencesA = $request->preferencesA;
        $form->preferencesT = $request->preferencesT;
        $form->objectives = $request->objectives;
        $form->description = $request->description;
        $form->rules = $request->rules;
        $form->family = $request->family;
        $form->familyUnemployment = $request->familyUnemployment;
        $form->hobbies = $request->hobbies;
        $form->reasons = $request->reasons;
        $form->presentation = $request->presentation;
        $form->posture = $request->posture;
        $form->breakes = $request->breakes;
        $form->speech = $request->speech;
        $form->understanding = $request->understanding;
        $form->comments = $request->comments;
        $form->result = $request->result;
        $form->finalSay = $request->finalSay;
        $form->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function show(Form $form)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function edit(Form $form)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Form $form)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function destroy(Form $form)
    {
        //
    }
}
