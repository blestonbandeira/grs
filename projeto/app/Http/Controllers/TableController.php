<?php

namespace App\Http\Controllers;

use App\CancellationReason;
use App\Category;
use App\ClassState;
use App\CourseName;
use App\District;
use App\DocumentType;
use App\ProvenanceSchool;
use App\Education;
use App\EventType;
use App\Gender;
use App\MinimumQualification;
use App\Origin;
use App\PermissionLevel;
use App\Regime;
use App\TestType;
use App\UnemployementSituation;
use Illuminate\Http\Request;


class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       
        $order = $request->order;
        
        $origins = Origin::all();
		$provenanceSchools = ProvenanceSchool::select('provenance_schools.id', 'provenance_schools.name')
			->when($order, function ($query, $order) {
				switch ($order) {
					case 'name':
						return $query->orderBy('provenance_schools.name');
					case 'id':
						return $query->orderBy('provenance_schools.id', 'ASC');
				}
			}, function ($query) {
				return $query->orderBy('provenance_schools.id', 'ASC');
			})->get();

        $cancellationReasons = CancellationReason::all();
        $categories = Category::all();
        $classStates = ClassState::all();
        $courseNames = CourseName::all();
        $districts = District::all();
        $documentTypes = DocumentType::all();
        $educations = Education::all();
        $eventTypes = EventType::all();
        $genders = Gender::all();
        $minimumQualifications = MinimumQualification::all();
        $permissionLevels = PermissionLevel::all();
        $regimes = Regime::all();
        $testTypes = TestType::all();
        $unemployementSituations = UnemployementSituation::all();

        return view('tables.index')
        ->with(compact('provenanceSchools', 
                    'cancellationReasons',
                    'categories',
                    'classStates',
                    'courseNames',
                    'districts',
                    'documentTypes',
                    'educations',
                    'eventTypes',
                    'genders', 
                    'minimumQualifications',
                    'origins',
                    'permissionLevels',
                    'regimes',
                    'testTypes',
                    'unemployementSituations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
