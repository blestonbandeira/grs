@extends('layouts.app')

@section('content')

<div class="content">
  <div class="container-fluid">

    <form action="/courses/{{ $course->id }}" method="post">
      @csrf
      @method('PUT')

      <div class="row">
          <div class="col-md-12">
              <div class="accordion" id="courses">

                  <div class="card">
                      <div class="card-header card-header-info" data-toggle="collapse" data-target="#coursesCreate" aria-expanded="true" aria-controls="coursesCreate">
                          <h4 class="card-title">Criar Novo Curso</h4>
                      </div>

                      <br/>
                      <div class="card-body">
          
                          <div class="row justify-content-md-center">                
                              <div class="col-md-10">

                                  <div>
                                    <br/>
                                    <label class="border-top-0 border-left-0 border-right-0" name="name">Nome do Curso</label>                                   
                                    <select class="custom-select border-top-0 border-left-0 border-right-0 input-height" name="course_name_id">
                                      @foreach($courseNames as $courseName)
                                        <option value="{{ $course->course_name_id }}">
                                            {{ $courseName->name }}
                                        </option>
                                      @endforeach
                                    </select>
                                  </div>

                                <div>
                                  <br/>
                                  <label class="border-top-0 border-left-0 border-right-0" name="course_type_id">Tipo do Curso</label>
                                  <select class="custom-select border-top-0 border-left-0 border-right-0 input-height" name="course_type_id">
                                      @foreach($courseTypes as $courseType)
                                        <option value="{{ $course->course_type_id }}">
                                            {{ $courseType->name }}
                                        </option>
                                      @endforeach
                                  </select>                                        
                                </div>                                     
                              </div>
                          </div>

                          <div class="row justify-content-md-center">                
                            <div class="col-md-5">
                              <div>
                                  <br/>
                                  <label class="border-top-0 border-left-0 border-right-0" name="name">Regime do Curso</label>
                                  <select class="custom-select border-top-0 border-left-0 border-right-0 input-height" name="regime_id">
                                      @foreach($regimes as $regime)
                                        <option value="{{ $course->regime_id }}">
                                            {{ $regime->name }}
                                        </option>
                                      @endforeach
                                  </select>                                   
                              </div>
                            </div>

                              <div class="col-md-5">
                                  <div>
                                    <br/>
                                    <label class="border-top-0 border-left-0 border-right-0" name="name">Habilitações Literárias Mínimas para o Curso</label>
                                    <select class="custom-select border-top-0 border-left-0 border-right-0 input-height" name="minimum_qualification_id">
                                        @foreach($minimumQualifications as $minimumQualification)
                                          <option value="{{ $course->minimum_qualification_id }}">
                                              {{ $minimumQualification->name }}
                                          </option>
                                        @endforeach
                                    </select>                                             
                                  </div>
                              </div>

                          </div>


                          <div class="row justify-content-end">
                              <div class="col-md-1">
                                  <button type="submit" class="btn btn-primary">Editar</button>
                                  
                              </div>
                          </div>
                      </div>           
                  </div>
                 
              </div>
          </div>
      </div>
  </div>
</div>



    </form>





@endsection
