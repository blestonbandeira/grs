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
                                <h4 class="card-title">Criar Novo Utilizador</h4>
                            </div>

                            
                            <div class="card-body">
                
                                <div class="row justify-content-md-center">     
                                    <div class="col-md-5">
                                        <br/>
                                        <label>Nome do Utilizador</label>
                                        <input class="form-control border-top-0 border-left-0 border-right-0" name="name" type="text">
                                    </div>

                                    <div class="col-md-4">
                                        <br/>
                                        <label>Email</label>
                                        <input class="form-control border-top-0 border-left-0 border-right-0" name="email" type="email">
                                    </div>
                                </div>

                                <div class="row justify-content-md-center">                
                                  
                                    <div class="col-md-3">
                                        <br/>
                                        <label>Password</label>
                                        <input class="form-control border-top-0 border-left-0 border-right-0" name="password" type="password">
                                    </div>

                                    <div class="col-md-3">
                                        <br/>
                                        <label>Repita a Password</label>
                                        <input type="password" class="form-control border-top-0 border-left-0 border-right-0" name="password">
                                    </div>


                                    <div class="col-md-3">
                                        <br/>
                                        <label class="border-top-0 border-left-0 border-right-0" name="name">Nome do Curso</label>
                                        <select name="permission_level_id" class="custom-select input-border-width">
                                                @if (count($permissionLevels) > 0 )
                                                    <option>-- selecione aqui o nível de acesso--</option>                                                        
                                                    @foreach($permissionLevels as $permissionLevel)
                                                        <option value="{{ $permissionLevel->id }}">
                                                            {{ $permissionLevel->name }}
                                                        </option>
                                                    @endforeach
                                                @else
                                                    <option>
                                                        --Não existem níveis de acesso registados na plataforma--
                                                    </option>
                                                @endif
                                        </select>                                            
                                    </div>
                                </div>

                                <div class="row justify-content-end">
                                    <div class="col-md-1">
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
