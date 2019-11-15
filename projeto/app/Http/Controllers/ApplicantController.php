<?php

namespace App\Http\Controllers;

use App\Applicant;
use App\Gender;
use App\RsClass;
use App\District;
use Illuminate\Http\Request;

class ApplicantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $applicants = Applicant::all();
        $rsclasses = RsClass::simplePaginate(5);

        return view('applicants.index')
        ->with(compact('applicants', 'rsclasses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $genders = Gender::all();
        $rsclasses = RsClass::all();
        $districts = District::all();
        return view('applicants.create')
        ->with(compact(
            'applicants',
            'genders',
            'rsclasses',
            'districts'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $applicant = new Applicant;
        $applicant->name = $request->name;
        $applicant->id_gender = $request->id_gender;
        $nif = $request->nif;
        if (validaNIF($nif)) {
            $applicant->nif = $nif;
        }
        $applicant->identityCard = $request->identityCard;
        $applicant->ccExpirationDate = $request->ccExpirationDate;
        $applicant->email = $request->email;
        // $applicant->town = $request->town;
        // $applicant->birthdate = $request->birthdate;
        // //botão, devia ser bool
        // $applicant->id_registrationState = 'Activo';
        // $applicant->applicationDate = $request->applicationDate;
        // //testar input-border-width nos selects
        // // foreach
        // $applicant->id_origin = $request->id_origin;
        // // foreach
        // $applicant->id_unemployementSituation = $request->id_unemployementSituation;
        // // foreach
        // $applicant->id_education = $request->id_educations;
        // $applicant->phoneNumber = $request->phoneNumber;
        // // foreach
        $applicant->id_district = $request->id_district;
        // $applicant->parish = $request->parish;
        // // foreach
        // $applicant->id_firstOptionCourse = $request->id_firstOptionCourse;
        // // foreach
        // $applicant->id_secondOptionCourse = $request->id_secondOptionCourse;
        // // foreach
        $applicant->id_rsClass = $request->id_rsClass;
        // // Campo no index que é alterado apenas se todos os documentos tiverem um check (pode ser alterado no create e no edit)
        // $applicant->apt = $request->apt;
        // // select que pode ser alterado no create, index e edit
        // $applicant->id_category = $request->id_category;
        $applicant->save();

        return redirect('/applicants');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Applicant  $applicant
     * @return \Illuminate\Http\Response
     */
    public function show(Applicant $applicant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Applicant  $applicant
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('applicants.modal');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Applicant  $applicant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Applicant $applicant)
    {
        $applicant->name = $request->name;
        $applicant->email = $request->email;
        $applicant->town = $request->town;
        $applicant->save();
        return redirect('/applicants');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Applicant  $applicant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Applicant $applicant)
    {
        $applicant->delete();
        return redirect('/applicants');
    }
}
