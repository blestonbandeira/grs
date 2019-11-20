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

        $cancellationReasons = CancellationReason::select('cancellation_reasons.id', 'cancellation_reasons.name')
                ->when($order, function ($query, $order) {
                    switch ($order) {
                        case 'name':
                            return $query->orderBy('cancellation_reasons.name');
                        case 'id':
                            return $query->orderBy('cancellation_reasons.id', 'ASC');
                    }
                }, function ($query) {
                    return $query->orderBy('cancellation_reasons.id', 'ASC');
                })->get();

        $categories = Category::select('categories.id', 'categories.name')
                ->when($order, function ($query, $order) {
                    switch ($order) {
                        case 'name':
                            return $query->orderBy('categories.name');
                        case 'id':
                            return $query->orderBy('categories.id', 'ASC');
                    }
                }, function ($query) {
                    return $query->orderBy('categories.id', 'ASC');
                })->get();

        $classStates = ClassState::select('class_states.id', 'class_states.name')
                ->when($order, function ($query, $order) {
                    switch ($order) {
                        case 'name':
                            return $query->orderBy('class_states.name');
                        case 'id':
                            return $query->orderBy('class_states.id', 'ASC');
                    }
                }, function ($query) {
                    return $query->orderBy('class_states.id', 'ASC');
                })->get();

        $courseNames = CourseName::select('course_names.id', 'course_names.name')
                ->when($order, function ($query, $order) {
                    switch ($order) {
                        case 'name':
                            return $query->orderBy('course_names.name');
                        case 'id':
                            return $query->orderBy('course_names.id', 'ASC');
                    }
                }, function ($query) {
                    return $query->orderBy('course_names.id', 'ASC');
                })->get();

        $districts = District::select('districts.id', 'districts.name')
                ->when($order, function ($query, $order) {
                    switch ($order) {
                        case 'name':
                            return $query->orderBy('districts.name');
                        case 'id':
                            return $query->orderBy('districts.id', 'ASC');
                    }
                }, function ($query) {
                    return $query->orderBy('districts.id', 'ASC');
                })->get();

        $documentTypes = DocumentType::select('document_types.id', 'document_types.name')
                ->when($order, function ($query, $order) {
                    switch ($order) {
                        case 'name':
                            return $query->orderBy('document_types.name');
                        case 'id':
                            return $query->orderBy('document_types.id', 'ASC');
                    }
                }, function ($query) {
                    return $query->orderBy('document_types.id', 'ASC');
                })->get();

        $educations = Education::select('education.id', 'education.name')
                    ->when($order, function ($query, $order) {
                        switch ($order) {
                            case 'name':
                                return $query->orderBy('education.name');
                            case 'id':
                                return $query->orderBy('education.id', 'ASC');
                        }
                    }, function ($query) {
                        return $query->orderBy('education.id', 'ASC');
                    })->get();

        $eventTypes = EventType::select('event_types.id', 'event_types.name')
                    ->when($order, function ($query, $order) {
                        switch ($order) {
                            case 'name':
                                return $query->orderBy('event_types.name');
                            case 'id':
                                return $query->orderBy('event_types.id', 'ASC');
                        }
                    }, function ($query) {
                        return $query->orderBy('event_types.id', 'ASC');
                    })->get();

        $genders = Gender::select('genders.id', 'genders.name')
                    ->when($order, function ($query, $order) {
                        switch ($order) {
                            case 'name':
                                return $query->orderBy('genders.name');
                            case 'id':
                                return $query->orderBy('genders.id', 'ASC');
                        }
                    }, function ($query) {
                        return $query->orderBy('genders.id', 'ASC');
                    })->get();

        $minimumQualifications = MinimumQualification::select('minimum_qualifications.id', 'minimum_qualifications.name')
                    ->when($order, function ($query, $order) {
                        switch ($order) {
                            case 'name':
                                return $query->orderBy('minimum_qualifications.name');
                            case 'id':
                                return $query->orderBy('minimum_qualifications.id', 'ASC');
                        }
                    }, function ($query) {
                        return $query->orderBy('minimum_qualifications.id', 'ASC');
                    })->get();

        $permissionLevels = PermissionLevel::select('permission_levels.id', 'permission_levels.name')
                    ->when($order, function ($query, $order) {
                        switch ($order) {
                            case 'name':
                                return $query->orderBy('permission_levels.name');
                            case 'id':
                                return $query->orderBy('permission_levels.id', 'ASC');
                        }
                    }, function ($query) {
                        return $query->orderBy('permission_levels.id', 'ASC');
                    })->get();

        $regimes = Regime::select('regimes.id', 'regimes.name')
                    ->when($order, function ($query, $order) {
                        switch ($order) {
                            case 'name':
                                return $query->orderBy('regimes.name');
                            case 'id':
                                return $query->orderBy('regimes.id', 'ASC');
                        }
                    }, function ($query) {
                        return $query->orderBy('regimes.id', 'ASC');
                    })->get();

        $testTypes = TestType::select('test_types.id', 'test_types.name')
                    ->when($order, function ($query, $order) {
                        switch ($order) {
                            case 'name':
                                return $query->orderBy('test_types.name');
                            case 'id':
                                return $query->orderBy('test_types.id', 'ASC');
                        }
                    }, function ($query) {
                        return $query->orderBy('test_types.id', 'ASC');
                    })->get();

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
