@extends('layouts.app')
@section('content')

<div class="content">
  <div class="container-fluid">
  <form action="/users/ {{ $user->id }}" method="POST">            
            @csrf
            @method('PUT')
            <div class="row">
                
                <div class="col-md-12">
                    <div class="accordion" id="users">
                        <div class="card">
                            <div class="card-header card-header-info" data-toggle="collapse" data-target="#usersCreate" aria-expanded="true" aria-controls="usersCreate">
                                <h4 class="card-title">Editar Utilizador</h4>
                            </div>

                            
                            <div class="card-body">
                
                                <div class="row justify-content-md-center">     
                                    <div class="col-md-3">
                                        <br/>
                                        <label>Nome do Utilizador</label>
                                        <input value="{{ $user->name }}" class="form-control border-top-0 border-left-0 border-right-0" name="name" type="text">
                                    </div>

                                    <div class="col-md-3">
                                        <br/>
                                        <label>Email</label>
                                        <input value="{{ $user->email }}" class="form-control border-top-0 border-left-0 border-right-0" name="email" type="email">
                                    </div>


                                    <div class="col-md-3">
                                        <br/>
                                        <label class="border-top-0 border-left-0 border-right-0" name="name">Nível de Acesso</label>
                                        <select name="permission_level_id" class="custom-select input-border-width">                                                                                       
                                            @foreach($permissionLevels as $permissionLevel)
                                                <option value="{{ $user->permission_level_id }}">
                                                    {{ $permissionLevel->name }}
                                                </option>
                                            @endforeach                                        
                                        </select>                                            
                                    </div>

                                </div>

                                

                                <div class="row justify-content-md-center">                
                                  
                                    <div class="col-md-4">
                                        <br/>
                                        <label>Coloque a sua password antiga</label>
                                        <input value="" class="form-control border-top-0 border-left-0 border-right-0" name="password" type="password">
                                    </div>

                                    <div class="col-md-4">
                                        <br/>
                                        <label>Coloque a password nova</label>
                                        <input value="" class="form-control border-top-0 border-left-0 border-right-0" name="password" type="password">
                                    </div>

                                    <div class="col-md-4">
                                        <br/>
                                        <label>Repita a password nova</label>
                                        <input value=""  type="password" class="form-control border-top-0 border-left-0 border-right-0" name="password">
                                    </div>

                                </div>

                                <div class="row justify-content-end">
                                    <div class="col-md-3">
                                        <br/>
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
