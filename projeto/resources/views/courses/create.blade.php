@extends('layouts.app')
@section('content')

<div class="content">
  <div class="container-fluid">
        <form id="submitForm" action="/courses" method="POST">            
            @csrf
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

                                        <div >
                                            <br/>
                                            <label class="border-top-0 border-left-0 border-right-0" name="name">Nome do Curso</label>
                                            <select name="course_name_id" class="custom-select input-border-width">
                                                @if (count($courseNames) > 0 )
                                                    <option>-- selecione aqui o nome do Curso --</option>                                                        
                                                    @foreach($courseNames as $courseName)
                                                        <option value="{{ $courseName->id }}">
                                                            {{ $courseName->name }}
                                                        </option>
                                                    @endforeach
                                                @else
                                                    <option>
                                                        --Não existem cursos na plataforma--
                                                    </option>
                                                @endif
                                            </select>                                           
                                        </div>

                                        <div >
                                            <label class="border-top-0 border-left-0 border-right-0" name="name">Tipo do Curso</label>
                                            <select name="course_type_id" class="custom-select input-border-width">
                                                @if (count($courseTypes) > 0 )
                                                    <option>-- selecione aqui o tipo do Curso --</option>                                                        
                                                    @foreach($courseTypes as $courseType)
                                                        <option value="{{ $courseType->id }}">
                                                            {{ $courseType->name }}
                                                        </option>
                                                    @endforeach
                                                @else
                                                    <option>
                                                        --Não existem tipos de curso na plataforma--
                                                    </option>
                                                @endif
                                            </select>                                            
                                        </div>                                     
                                    </div>
                                </div>

                                <div class="row justify-content-md-center">                
                                    <div class="col-md-5">
                                        <div >
                                            <label class="border-top-0 border-left-0 border-right-0" name="name">Regime do Curso</label>
                                            <select name="regime_id" class="custom-select input-border-width">
                                                    @if (count($regimes) > 0 )
                                                        <option>-- selecione aqui o regime do Curso --</option>                                                        
                                                        @foreach($regimes as $regime)
                                                            <option value="{{ $regime->id }}">
                                                                {{ $regime->name }}
                                                            </option>
                                                        @endforeach
                                                    @else
                                                        <option>
                                                            --Não existem regimes na plataforma--
                                                        </option>
                                                    @endif
                                            </select>                                        
                                        </div>
                                    </div>

                                    <div class="col-md-5">
                                        <div >
                                            <label class="border-top-0 border-left-0 border-right-0" name="name">Habilitações Literárias Mínimas para o Curso</label>

                                            <select name="minimum_qualification_id" class="custom-select input-border-width">
                                                    @if (count($minimumQualifications) > 0 )
                                                        <option>-- selecione aqui as Habilitações Literárias mínimas para o Curso --</option>                                                        
                                                        @foreach($minimumQualifications as $minimumQualifications)
                                                            <option value="{{ $minimumQualifications->id }}">
                                                                {{ $minimumQualifications->name }}
                                                            </option>
                                                        @endforeach
                                                    @else
                                                        <option>
                                                            --Não existem habilitações literárias mínimas na plataforma--
                                                        </option>
                                                    @endif
                                            </select>                                            
                                        </div>
                                    </div>

                                </div>


                                <div class="row justify-content-end">
                                    <div class="col-md-3">
                                        
                                        <button type="submit" id="submitButton" onclick="this.disabled=true;this.form.submit();" class="btn btn-primary">Criar</button>
                                        
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
