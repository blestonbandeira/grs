@extends('layouts.app')
@section('content')

<div class="content">
  <div class="container-fluid">
        <form action="/users" method="POST">            
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

                                        <div class="form-group" >
                                            <label class="bmd-label-floating" name="name">Nome do Curso</label>
                                            <select id="permission-level" name="permission_level_id" class="custom-select input-border-width">
                                                @foreach($courseNames as $courseName)
                                                <option value="{{ $courseName->id }}">
                                                    {{ $courseName->name }}
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
