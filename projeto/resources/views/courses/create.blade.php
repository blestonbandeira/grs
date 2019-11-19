@extends('layouts.app')
@section('content')

<div class="content">
  <div class="container-fluid">
        <form action="/courses" method="POST">            
            @csrf
            <div class="row">
                
                <div class="col-md-12">
                    <div class="accordion" id="users">
                        <div class="card">
                            <div class="card-header card-header-info" data-toggle="collapse" data-target="#usersCreate" aria-expanded="true" aria-controls="usersCreate">
                                <h4 class="card-title">Criar Novo Curso</h4>
                            </div>

                            <br/>
                            <div class="card-body">
                
                                <div class="row justify-content-md-center">                
                                    <div class="col-md-10">

                                        <div >
                                            <label class="border-top-0 border-left-0 border-right-0" name="name">Nome do Curso</label>
                                            <select name="course_name_id" class="custom-select input-border-width">
                                                @foreach($courseNames as $courseName)
                                                <option value="{{ $courseName->id }}">
                                                    {{ $courseName->name }}
                                                </option>
                                                @endforeach
                                            </select>                                            
                                        </div>

                                        <div >
                                            <label class="border-top-0 border-left-0 border-right-0" name="name">Tipo do Curso</label>
                                            <select name="course_type_id" class="custom-select input-border-width">
                                                @foreach($courseTypes as $courseType)
                                                <option value="{{ $courseType->id }}">
                                                    {{ $courseType->name }}
                                                </option>
                                                @endforeach
                                            </select>                                            
                                        </div>

                                        <div >
                                            <label class="border-top-0 border-left-0 border-right-0" name="name">Regime do Curso</label>
                                            <select name="regime_id" class="custom-select input-border-width">
                                                @foreach($regimes as $regime)
                                                <option  value="{{ $regime->id }}">
                                                    {{ $regime->name }}
                                                </option>
                                                @endforeach
                                            </select>                                            
                                        </div>

                                        <div >
                                            <label class="border-top-0 border-left-0 border-right-0" name="name">Habilitações Literárias Mínimas para o Curso</label>
                                            <select name="minimum_qualification_id" class="custom-select input-border-width">
                                                @foreach($minimumQualifications as $minimumQualification)
                                                <option value="{{ $minimumQualification->id }}">
                                                    {{ $minimumQualification->name }}
                                                </option>
                                                @endforeach
                                            </select>                                            
                                        </div>

                                    </div>
                                </div>


                                <div class="row justify-content-end">
                                    <div class="col-md-3">
                                        <button type="submit" class="btn btn-primary">Criar</button>
                                        
                                    </div>
                                </div>
                            </div>           
                        </div>
                    </div>
                </div>                
                
            </div>
        </form>
    </div>
</div>


            
@endsection
