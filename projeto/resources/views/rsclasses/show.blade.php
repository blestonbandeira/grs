@extends('layouts.app')
@section('content')
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
                                {{-- <label class="form-control border-0">{{ $rsClass->course_name_id}}</label> --}}
                                <label class="form-control border-0">{{ DB::table('course_names')->where('id', $rsClass->course_name_id )->value('name') }}</label>
                            </div>

                            <div>
                                <label class="border-top-0 border-left-0 border-right-0" name="name">Assistente de Formação</label>
                                <label class="form-control border-0">{{ DB::table('users')->where('id', $rsClass->user_id )->value('name') }}</label>
                            </div>

                            <div>
                                <label class="border-top-0 border-left-0 border-right-0" name="name">Estado da Turma</label>
                                {{-- <label class="form-control border-0">{{ $rsClass->class_state_id }}</label> --}}
                                <label class="form-control border-0">{{ DB::table('class_states')->where('id', $rsClass->class_state_id )->value('name') }}</label>
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
@endsection