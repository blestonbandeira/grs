<?php

namespace App\Http\Controllers;

use App\RsClass;
use App\CourseName;
use Illuminate\Http\Request;

class RsClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rsclasses = RsClass::all();
        return view('rsclasses.index')
        ->with(compact('rsclasses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = CourseName::all();
        return view('rsclasses.create')
        ->with(compact('rsclasses', 'courses'));
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
     * @param  \App\RsClass  $rsClass
     * @return \Illuminate\Http\Response
     */
    public function show(RsClass $rsClass)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RsClass  $rsClass
     * @return \Illuminate\Http\Response
     */
    public function edit(RsClass $rsClass)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RsClass  $rsClass
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RsClass $rsClass)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RsClass  $rsClass
     * @return \Illuminate\Http\Response
     */
    public function destroy(RsClass $rsClass)
    {
        //
    }
}
