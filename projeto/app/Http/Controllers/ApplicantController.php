<?php

namespace App\Http\Controllers;

use App\Applicant;
use App\Gender;
use App\RsClass;
use App\District;
use App\Origin;
use App\Education;
use App\UnemployementSituation;
use App\Course;
use App\ProvenanceSchool;
use App\CancellationReason;
use App\Category;


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
        $rsClasses = RsClass::all();
        $rsClasses = RsClass::simplePaginate(10);
        $counter = Applicant::withCount('rsClass')->get()->count();
        $categories = Category::all();

        //calcular a idade e mostrar numa das colnas
        // $birthdate = Applicant::all('birthdate');
        // $today = new DateTime('today');
        // $age = $birthdate->diff($today)->y;

        return view('applicants.index')
        ->with(compact(
            'applicants', 
            'rsClasses',
            'categories',
            'counter'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $genders = Gender::all();
        $provenance_schools = ProvenanceSchool::all();
        $rsclasses = RsClass::all();
        $origins = Origin::all();
        $districts = District::all();
        $educations = Education::all();
        $unemployementSituations = UnemployementSituation::all();
        $courses = Course::all();
        $cancellationReasons = CancellationReason::all();

        return view('applicants.create')
        ->with(compact(
            'genders',
            'rsclasses',
            'origins',
            'districts',
            'educations',
            'unemployementSituations',
            'courses',
            'provenance_schools',
            'cancellationReasons'
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
        // dd($request->gender_name);
        
        $request->gender_id = Gender::where('genders.name', '=', $request->name)->get();
        dd($request->gender_id);
        $applicant->gender_id = $request->gender_id;
        $nif = $request->nif;
        if (validaNIF($nif)) {
            $applicant->nif = $nif;
        }
        $applicant->identityCard = $request->identityCard;
        $applicant->ccExpirationDate = $request->ccExpirationDate;
        $applicant->email = $request->email;
        $applicant->town = $request->town;
        $applicant->birthdate = $request->birthdate;
        // //botão, devia ser bool
        // $applicant->registration_state_id = 'Activo'; 
        $applicant->applicationDate = $request->applicationDate;
        $applicant->origin_id = $request->origin_id;
        $applicant->unemployement_situation_id = $request->unemployement_situation_id;
        $applicant->education_id = $request->education_id;
        $applicant->phoneNumber = $request->phoneNumber;
        $applicant->district_id = $request->district_id;
        $applicant->parish = $request->parish;
        $applicant->first_option_course_id = $request->first_option_course_id;
        $applicant->second_option_course_id = $request->second_option_course_id;
        $applicant->rs_class_id = $request->rs_class_id;
        // // Campo no index que é alterado apenas se todos os documentos tiverem um check (pode ser alterado no create e no edit)
        // $applicant->apt = $request->apt;
        // // select que pode ser alterado no create, index e edit
        // $applicant->category_id = $request->category_id;
        
        $applicant->provenance_school_id = $request->provenance_school_id;
        $applicant->address = $request->address;
        $applicant->birthtown = $request->birthtown;
        $applicant->nationality= $request->nationality;
        $applicant->civilState = $request->civilState;
        //dar a possibilidade de ver com hover as observações de cada candidato no index
        $applicant->observations = $request->observations;
        $applicant->cancellation_reason_id = $request->cancellation_reason_id;
        //acrescentar a opção alternate (bool) tambem no index
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

