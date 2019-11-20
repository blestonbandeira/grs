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
                                <h4 class="card-title">Criar Nova Turma</h4>
                            </div>

                            <br/>
                            <div class="card-body">
                
                                <div class="row justify-content-md-center">                
                                    <div class="col-md-10">

                                        <div >
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
                                                    @if (count($users) > 0 )
                                                        <option>-- selecione aqui a Assistente de Formação --</option>                                                        
                                                        @foreach($users as $user)
                                                            <option value="{{ $user->id }}">
                                                                {{ $user->name }}
                                                            </option>
                                                        @endforeach
                                                    @else
                                                        <option>
                                                            --Não existem assistentes de formação--
                                                        </option>
                                                    @endif                                               
                                            </select>                                            
                                        </div>

                                        <div >
                                            <label class="border-top-0 border-left-0 border-right-0" name="name">Regime do Curso</label>
                                            <select name="regime_id" class="custom-select input-border-width">
                                                    @if (count($classStates) > 0 )
                                                        <option>-- selecione aqui a estado da turma--</option>
                                                        @foreach($classStates as $classState)
                                                            <option  value="{{ $classState->id }}">
                                                                {{ $classState->name }}         
                                                            </option>                                                       
                                                        @endforeach
                                                        </option>
                                                    @else
                                                        <option>
                                                            --Não existem estados de turma na plataforma--
                                                        </option>
                                                    @endif                                               
                                            </select>                                            
                                        </div>

                                    </div>
                                    <div class="col-md-2">
                                        <label>Data de Início
                                        </label>
                                        <input type="date" class="form-control border-top-0 border-left-0 border-right-0" name="birthdate" format="dd/MM/yyyy">
                                    </div>
                                </div>

                                <div class="row justify-content-end">
                                    <div class="col-md-1">
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
