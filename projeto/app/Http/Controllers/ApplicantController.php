<?php

namespace App\Http\Controllers;

use App\Applicant;
use App\Gender;
use App\RsClass;
use App\District;
use App\Origin;
use App\Education;
use App\UnemployementSituation;
use App\CourseName;
use App\ProvenanceSchool;
use App\CancellationReason;
use App\Category;
use App\Interview;

use Illuminate\Http\Request;
use Psr\Log\NullLogger;

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
        $rsClasses = RsClass::simplePaginate(10);
        $counter = Applicant::withCount('rsClass')->get()->count();
        $categories = Category::all();
        $interviews = Interview::all();
        //calcular a idade e mostrar numa das colnas
        // $birthdate = Applicant::all('birthdate');
        // $today = new DateTime('today');
        // $age = $birthdate->diff($today)->y;

        return view('applicants.index')
        ->with(compact(
            'applicants', 
            'rsClasses',
            'categories',
            'counter',
            'interviews'
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
        $courseNames = CourseName::all();
        $cancellationReasons = CancellationReason::all();

        
        $courseArray = [];
        foreach($courseNames as $courseN){
            $tempCourseN = CourseName::where('name', '=',$courseN->name)->first();
            $tempClassN = RsClass::where('course_name_id', '=', $tempCourseN->id)->first();
            if ($tempClassN == null)
            {
                array_push($courseArray, [
                    "courseId" => $tempCourseN->id,
                    "courseName" => $tempCourseN->name,
                    "classId" => null,
                    "className" => "Não Existe Turma Definida!"
                ]);
            }
            else
            {
                array_push($courseArray, [
                    "courseId" => $tempCourseN->id,
                    "courseName" => $tempCourseN->name,
                    "classId" => $tempClassN->id,
                    "className" => $tempClassN->name
                ]);
            }            
        }

        return view('applicants.create')
        ->with(compact(
            'courseArray',
            'genders',
            'rsclasses',
            'origins',
            'districts',
            'educations',
            'unemployementSituations',
            'courseNames',
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
        $this->validate($request, [
            'name' => 'required',            
            'email' => 'required'
        ]);

        $applicant = new Applicant;
        $applicant->name = $request->name;
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
        $applicant->cancellationDate = $request->cancellationDate;
        $applicant->cancellation_reason_id = $request->cancellation_reason_id;
        //acrescentar a opção alternate (bool) tambem no index

        $applicant->cc = $request->cc;
        $applicant->appForm = $request->appForm;
        $applicant->diploma = $request->diploma;
        $applicant->unemployementUrl = $request->unemployementUrl;
        $applicant->curriculum = $request->curriculum;
        $applicant->criminalRecord = $request->criminalRecord;
        $applicant->medicalRecord = $request->medicalRecord;
        $applicant->dataAssessment = $request->dataAssessment;

        $applicant->save();

        return redirect('/applicants')->with('success', 'O Candidato foi adicionado com sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Applicant  $applicant
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $applicant = Applicant::find($id);
        $gender = Gender::all();
        return view('applicants.show')
                ->with(compact('applicant',
                                'gender'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Applicant  $applicant
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $applicant = Applicant::find($id);
        $genders = Gender::all();
        $provenance_schools = ProvenanceSchool::all();
        $rsclasses = RsClass::all();
        $origins = Origin::all();
        $districts = District::all();
        $educations = Education::all();
        $unemployementSituations = UnemployementSituation::all();
        $courseNames = CourseName::all();
        $cancellationReasons = CancellationReason::all();

        $courseArray = [];
        foreach($courseNames as $courseN){
            $tempCourseN = CourseName::where('name', '=',$courseN->name)->first();
            $tempClassN = RsClass::where('course_name_id', '=', $tempCourseN->id)->first();
            if ($tempClassN == null)
            {
                array_push($courseArray, [
                    "courseId" => $tempCourseN->id,
                    "courseName" => $tempCourseN->name,
                    "classId" => null,
                    "className" => "Não Existe Turma Definida!"
                ]);
            }
            else
            {
                array_push($courseArray, [
                    "courseId" => $tempCourseN->id,
                    "courseName" => $tempCourseN->name,
                    "classId" => $tempClassN->id,
                    "className" => $tempClassN->name
                ]);
            }            
        }

        return view('applicants.edit')
        ->with(compact(
            'applicant',
            'genders',
            'rsclasses',
            'origins',
            'districts',
            'educations',
            'unemployementSituations',
            'courseNames',
            'provenance_schools',
            'cancellationReasons',
            'courseArray'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Applicant  $applicant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',            
            'email' => 'required'
        ]);

        $applicant = Applicant::find($id);
        $applicant->name = $request->name;
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
        $applicant->cancellationDate = $request->cancellationDate;
        $applicant->cancellation_reason_id = $request->cancellation_reason_id;
        //acrescentar a opção alternate (bool) tambem no index

        // $applicant->cc = $request->cc;
        // $applicant->appForm = $request->appForm;
        // $applicant->diploma = $request->diploma;
        // $applicant->unemployementUrl = $request->unemployementUrl;
        // $applicant->curriculum = $request->curriculum;
        // $applicant->criminalRecord = $request->criminalRecord;
        // $applicant->medicalRecord = $request->medicalRecord;
        // $applicant->dataAssessment = $request->dataAssessment;

        $applicant->save();
        
        return redirect('/applicants')->with ('success', 'O candidato foi actualizado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Applicant  $applicant
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $applicant = Applicant::find($id);
        $applicant->delete();

        return redirect('/applicants')->with('success','Candidato apagado com sucesso.');
    }
}

