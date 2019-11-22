@extends('layouts.app')
@section('content')
<div class="content">
  <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="accordion" id="courses">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-header card-header-info" data-toggle="collapse" data-target="#coursesCreate" aria-expanded="true" aria-controls="coursesCreate">
                                    <h4 class="card-title">Curso #{{ $course->id }}</h4>
                                </div>
                                <div class="row justify-content-md-center">                
                                    <div class="col-md-10">

                                        <div >
                                            <br/>
                                            <label class="border-top-0 border-left-0 border-right-0" name="name">Nome do Curso</label>
                                            <label class="form-control border-0">{{ DB::table('course_names')->where('id', $course->course_name_id )->value('name') }}</label>
                                        </div>

                                        <div >
                                            <label class="border-top-0 border-left-0 border-right-0" name="name">Tipo do Curso</label>
                                            <label class="form-control border-0">{{ DB::table('course_types')->where('id', $course->course_type_id )->value('name') }}</label>
                                        </div>                                     
                                    </div>
                                </div>

                                <div class="row justify-content-md-center">                
                                    <div class="col-md-5">
                                        <div >
                                            <label class="border-top-0 border-left-0 border-right-0" name="name">Regime do Curso</label>
                                            <label class="form-control border-0">{{ DB::table('regimes')->where('id', $course->regime_id )->value('name') }}</label>
                                        </div>
                                    </div>

                                    <div class="col-md-5">
                                        <div >
                                            <label class="border-top-0 border-left-0 border-right-0" name="name">Habilitações Literárias Mínimas para o Curso</label>
                                            <label class="form-control border-0">{{ DB::table('minimum_qualifications')->where('id', $course->minimum_qualification_id )->value('name') }}</label>
                                        </div>
                                    </div>

                                </div>


                                
                            </div>           
                        </div>
                    </div>
                </div>                
                
            </div>
    </div>
</div>


            
@endsection
