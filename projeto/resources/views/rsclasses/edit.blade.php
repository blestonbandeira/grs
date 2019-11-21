@extends('layouts.app')
@section('content')

<div class="content">
  <div class="container-fluid">
  <form action="/rsclasses/ {{ $rsClass->id}}" method="POST">            
            @csrf
            @method('PUT')
            <div class="row">
                
                <div class="col-md-12">
                    <div class="accordion" id="users">
                        <div class="card">
                            <div class="card-header card-header-info" data-toggle="collapse" data-target="#usersCreate" aria-expanded="true" aria-controls="usersCreate">
                                <h4 class="card-title">Editar Turma</h4>
                            </div>

                            <br/>
                            <div class="card-body">
                
                                <div class="row justify-content-md-center">                
                                    <div class="col-md-10">

                                        <div >
                                            <label class="border-top-0 border-left-0 border-right-0" name="name">Nome do Curso</label>
                                            <select id="courseSelected" onchange="getRsClassName()" name="course_name_id" class="custom-select input-border-width">                                                                                          
                                              @foreach($courseNames as $courseName)
                                                  <option value="{{ $rsClass->course_name_id }}">
                                                      {{ $courseName->name }}
                                                  </option>
                                              @endforeach                                        
                                            </select>                                            
                                        </div>

                                        <div>
                                            <label class="border-top-0 border-left-0 border-right-0" name="name">Assistente de Formação</label>
                                            <select name="user_id" class="custom-select input-border-width">                                                   
                                              @foreach($users as $user)
                                                  <option value="{{ $rsClass->user_id }}">
                                                      {{ $user->name }}
                                                  </option>
                                              @endforeach
                                                                                        
                                            </select>                                            
                                        </div>

                                        <div>
                                            <label class="border-top-0 border-left-0 border-right-0" name="name">Estado da Turma</label>
                                            <select name="class_state_id" class="custom-select input-border-width">
                                              @foreach($classStates as $classState)
                                                  <option  value="{{ $rsClass->class_state_id }}">
                                                      {{ $classState->name }}         
                                                  </option>                                                       
                                              @endforeach
                                            </select>                                            
                                        </div>

                                    </div>

                                    <div class="col-md-2">
                                        <div class="row">

                                            <div class="col-md-12">
                                                <label>Data de Início</label>
                                                <input id="today" min="{{ $rsClass->startDate }}" oninput="getRsClassName()" type="date" class="form-control border-top-0 border-left-0 border-right-0" name="startDate" format="yyyy/MM/dd">
                                            </div>

                                            <div class="col-md-12">
                                                <label>Nome da Turma</label>
                                                <input id="rsClassNameCreated" value="" type="text" class="form-control border-top-0 border-left-0 border-right-0" name="rs_class_name"/>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="row justify-content-end">
                                    <div class="col-md-3">
                                        <button type="submit" id="submitButton" onclick="this.disabled=true;this.form.submit();" class="btn btn-primary">Gravar</button>
                                        
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
